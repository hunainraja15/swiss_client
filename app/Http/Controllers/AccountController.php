<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Folder;
use App\Models\File;



class AccountController extends Controller
{
    //
    public function index(){
       
    $users = User::where('role', 'user')->latest()->get();

    
        return view('account.index' , compact('users'));
    }

    public function show($id){
       
    $user = User::where('role', 'user')->where('id',$id)->get()->first();
        return view('account.show' , compact('user'));
    }
}
