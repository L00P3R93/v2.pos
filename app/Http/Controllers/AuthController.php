<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(): View {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        return redirect('home')->with('success', 'You are now logged in');
    }
}
