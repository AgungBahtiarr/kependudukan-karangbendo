<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        $title = "Login";

        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect('/auth/login')->withErrors(['auth' => 'Email atau password salah']);
        }
    }


    public function logout(Request $request)
    {
        $title = "Logout";

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login', compact('title'));
    }
}
