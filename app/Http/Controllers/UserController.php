<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\User;
class UserController extends Controller
{
  
    public function show(){
        $users=User::whereNot('role',1)->get();
    //    $users=User::all();
     return view('admin-dashboard.users',compact('users'));
    
    }
}
