<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($req->only('email', 'password'))) {
            return back()->with('status', 'Invalid User Credentials!');
        }

        return redirect()->route('home');
    }
}
