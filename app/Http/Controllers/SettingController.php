<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    //

     public function index(){
        $users = User::where('role', 'user')->where('status', 'deactive')->get();
        return view('setting.index' , compact('users'));
     }
}
