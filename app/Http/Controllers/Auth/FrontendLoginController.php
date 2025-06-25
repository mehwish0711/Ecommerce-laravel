<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendLoginController extends Controller
{
    //
    
     public function store(Request $request){
        $credential=$request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('frontend')->attempt($credential)){
          $request-> session()->regenerate();
          return redirect()->route('index');
        }
         return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->onlyInput('email');
       
    }
    public function show(){
     return view('frontendlogin');   
    }
    public function logout(){
        Auth::guard('frontend')->logout();
        return redirect()->route('frontenduser');
    }
}
