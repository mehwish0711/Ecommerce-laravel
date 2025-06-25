<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\FrontendUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendUserController extends Controller
{
    // to show frontend register page
    public function show(){
        return view('frontenduser');
    }
      // to show frontend register page
    public function store(Request $request){
       $user= new FrontendUser;
       $user->name = $request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->phone=$request->phone;
       $user->city=$request->city;
       $user->save();
       return redirect()->route('frontenduser')->with('status','You are registered successfully');
       }
       
}
