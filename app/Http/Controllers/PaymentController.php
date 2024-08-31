<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class PaymentController extends Controller
{
    //
    public function index(){
        return view('payment.index');
    }
    public function pay(Request $request){
        if ($request->type == 'stripe') {
            // Retrieve the user by ID
            $user = User::find($request->id);
            
            // Update the user's status
            if ($user) {
                $user->update(['status' => 'active']);
                
                // Log in the user
                Auth::login($user);
                
                // Redirect to the home route
                return redirect()->route('home');
            } else {
                // Handle the case where the user is not found
                return redirect()->back()->withErrors(['User not found.']);
            }
        }
    }
}
