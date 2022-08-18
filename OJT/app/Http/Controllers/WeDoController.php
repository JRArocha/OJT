<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeDoController extends Controller
{
    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials =  $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended('Dashboard')->with('message', 'Signed In!');
        }

        return redirect('/WeDoLogin')->with('message', 'Login Details are not valid!');
    }

    public function dashboard()
    {
        return view('WeDoOjt');
    }

    public function signup()
    {
        return view('trial.createaccount');
    }

    public function login()
    {
        return view('trial.loginpage');
    }

}
