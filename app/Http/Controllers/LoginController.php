<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check() || Auth::viaRemember()) {
            return redirect()->intended('/');
        }
        return view('pages.login');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'alpha_num', 'min:8']
        ]);

        if ($request['remember']) {
            Cookie::queue('e_cookie', $data['email'], 120);
            Cookie::queue('p_cookie', $request['password'], 120);
        }
        
        if (Auth::attempt($data, true)) {
            $user = Auth::user();
            Session::put('session', $data);
            Session::put('user', $user);
            $request->session()->regenerate();
            return redirect()->intended('/home');
        };

        return back()->withErrors("Wrong Credentials! Invalid Email Address or Password!");
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->intended('/');
    }
}
