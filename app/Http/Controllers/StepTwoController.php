<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\Step2MailClass;
use App\Models\StepTwo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class StepTwoController extends Controller
{
    public function send_email(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $randomString = Str::random(6);
        $randomString = '123';
        
        // Update or create the StepTwo record
        $step2 = StepTwo::updateOrCreate(
            ['two_factor_email' => $request->email],
            [
                'two_fa_code' => Hash::make($randomString), // No need to hash
                'two_factor_enabled' => true,
                'updated_at' => now(), // Eloquent manages created_at automatically
            ]
        );

        // Prepare data for the email
        $data = [
            'name' => $request->email,
            'otp' => $randomString,
            'date' => now()->format('Y-m-d H:i:s'),
        ];
 // Return a view (if needed)
        // return view('auth.profile.email', compact('data'));

        // Send the email
        Mail::to($request->email)->send(new Step2MailClass($data));

        $id['id'] = $step2->id;
        $id['email'] = $request->email;
        $id['password'] = $request->password;

        // Return a view with data
        return view('user.verify', compact('id'));
    }

    public function verifyTwoFactor(Request $request)
    {
   
        // Validate the request to ensure `fa_code` and `email` are present
        $request->validate([
            'fa_code' => 'required|string',
            'email' => 'required|email'
        ]);

        // Retrieve the StepTwo record for the user
        $step2 = StepTwo::where('two_factor_email', $request->email)->first();

        // Check if a record was found and if the `fa_code` matches
        if ($step2 && Hash::check($request->fa_code, $step2->two_fa_code)) {
            
            // Find the user by email
            $user = User::where('email', $request->email)->first();

            if ($user) {
                Auth::login($user);
                // Redirect with success message
                return redirect()->route('home')->with('success', 'Two-factor authentication successful.');
            } else {
          
            }
        } else {
   
            return redirect(route('login'))->withErrors(['OTP not valid']);

        }
    }
    
}

