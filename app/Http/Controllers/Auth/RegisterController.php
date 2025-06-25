<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //  show register page
    public function showRegister(){
    return view('admin-dashboard.register');
    }
      //  register new user
      public function addUser(Request $request){
        // dd($request->all()); to check
      $user= new User();
      $user->name= $request->name;
       $user->email= $request->email;
       $user->password = Hash::make($request->password);
         $user->role = 2;
         $user->save();
         return redirect()->route('login');
    }
}
