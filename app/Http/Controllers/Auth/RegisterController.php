<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone_number' => 'required|numeric',
            'postal_address' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        //    'terms' => 'required|accepted',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $data['password'] = Hash::make($data['password']);
 
         $user = new User();
         $user->fname = $data['fname'];
         $user->lname = $data['lname'];
         $user->company_name = $data['company_name'];
         $user->email = $data['email'];
         $user->phone_number = $data['phone_number'];
         $user->postal_address = $data['postal_address'];
         $user->password = $data['password'];
         $user->save();
         return $user;
        //  return redirect()->route('home')->with('success', 'Registration successful!');
    }

}
