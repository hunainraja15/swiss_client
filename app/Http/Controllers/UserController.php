<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (Auth::user()->status == 'active') {
            $users = User::where('role', 'client')->get();
            return view('user.index', compact('users'));
        // }
        
        return back();
    }
    public function show() {
        
        
        return view('auth.profile.index');
    }
    
    
    public function login(Request $request)
    {
        // Validate the input data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Attempt to log the user in
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        // Authentication passed, return the authenticated user
        $user = Auth::user();
        return back()->with('user', $user);
    }

    // Authentication failed
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('email'));

    }

    public function status_update(Request $request){
        // Validate the incoming request data
    $request->validate([
        'id' => 'required|exists:users,id',
    ]);

    // Find the user by ID
    $user = User::find($request->id);
$date = now()->format('Y-m-d H:i:s');
    // Toggle the user's status
    if ($user->status == 'active') {
        $user->status = 'deactive';
        $user->status_update = $date;
    } else {
        $user->status = 'active';
        $user->status_update = $date;
    }

    // Save the updated status
    $user->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'User status updated successfully!');
    }

    public function status(Request $request)
{
    // Retrieve the user IDs from the request
    $userIds = $request->input('user_ids');
    $newStatus = $request->input('status');

    // Validate the request
    if (!is_array($userIds) || !in_array($newStatus, ['active', 'deactive'])) {
        return redirect()->back()->withErrors(['Invalid input']);
    }

    // Update the status for all users with the given IDs
    User::whereIn('id', $userIds)->update(['status' => 'active']);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'User statuses updated successfully.');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // dd($request->role);
    $validatedData = $request->validate([
        'fname' => 'nullable|string|max:255',
        'lname' => 'nullable|string|max:255',
        'age' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'phone_number' => 'nullable|string|min:10|max:15',
        'password' => 'required|string|min:8|confirmed',
        'signature' => 'nullable|file|mimes:jpeg,png,pdf,doc,docx|max:2048',
    ]);

    // Process the data
    $data = $validatedData;
    $data['password'] = Hash::make($data['password']);
    
    // Handle file upload for the signature
    if ($request->hasFile('signature')) {
        $file = $request->file('signature');
        $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/signatures', $fileName);
        $data['signature'] = $filePath;
    }
    
    // Create a new user instance and assign the fields
    $user = new User();
    $user->fname = $data['fname'] ?? null;
    $user->lname = $data['lname'] ?? null;
    $user->role = $request->role ?? 'user';
    $user->age = $data['age'] ?? null;
    $user->address = $data['address'] ?? null;
    $user->email = $data['email'];
    $user->status = $data['status'] ?? 'deactive';
    $user->company_name = $data['company_name'] ?? null;
    $user->phone_number = $data['phone_number'] ?? null;
    $user->postal_address = $request->postal_address ?? null;
    $user->signature = $data['signature'] ?? null;
    $user->password = $data['password'];
    $user->limit = $data['limit'] ?? '100gb';
    $user->status_update = $data['status_update'] ?? null;
    
    // Save the user to the database
    $user->save();
    

    // Handle authentication after saving
    if (Auth::check()) {
        return back();
    } else {
        Auth::login($user);
        return back()->with('user', $user);
    }

}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // Find the user by ID
    $user = User::findOrFail($id);

    // Validate the request data
    $validatedData = $request->validate([
        'fname' => 'nullable|string|max:255',
        'lname' => 'nullable|string|max:255',
        'role' => 'nullable|string',
        'status' => 'nullable|string',
        'company_name' => 'nullable|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'phone_number' => 'nullable|string|min:10|max:15',
        'postal_address' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'age' => 'nullable|string|max:255',
        'signature' => 'nullable|file|mimes:jpeg,png,pdf,doc,docx|max:2048',
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Process the data
    $data = $request->all();
    
    if (!empty($data['password'])) {
        $data['password'] = Hash::make($data['password']);
    } else {
        unset($data['password']); // Don't update password if it's not provided
    }

    // Handle file upload
    if ($request->hasFile('signature')) {
        $file = $request->file('signature');
        $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = 'public/signatures/' . $fileName;
        $file->storeAs('public/signatures', $fileName);
        $data['signature'] = $filePath;
    }

    // Update user details
    $user->fname = $data['fname'] ?? $user->fname;
    $user->lname = $data['lname'] ?? $user->lname;
    $user->role = $data['role'] ?? $user->role;
    $user->status = $data['status'] ?? $user->status;
    $user->company_name = $data['company_name'] ?? $user->company_name;
    $user->email = $data['email'] ?? $user->email;
    $user->phone_number = $data['phone_number'] ?? $user->phone_number;
    $user->postal_address = $data['postal_address'] ?? $user->postal_address;
    $user->address = $data['address'] ?? $user->address;
    $user->age = $data['age'] ?? $user->age;
    $user->signature = $data['signature'] ?? $user->signature;
    
    if (isset($data['password'])) {
        $user->password = $data['password'];
    }

    $user->limit = $data['limit'] ?? $user->limit;
    $user->status_update = $data['status_update'] ?? $user->status_update;

    // Save the updated user
    $user->save();

    // Redirect or return response
    return back()->with('success', 'User updated successfully');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
