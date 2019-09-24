<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class authcontroller extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(Auth::user()->roles == 's_admin'){
                return redirect('/s_admin');
            }else if(Auth::user()->roles == 'admin'){
                return redirect('/admin');
            }else if(Auth::user()->roles == 'pembeli'){
                return redirect('/pembeli');
            }else {
                return "lu sapa bangs*t ?";
            }
        }
    }
}
