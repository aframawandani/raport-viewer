<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function post(Request $request) {
        $credentials = [
            'email' => $request->get('username'),
            'password' => $request->get('password')
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('user', $user);

            return redirect('/');
        }
        else {
            return redirect()->back()->withErrors(['Username atau Password salah']);
        }
    }
}
