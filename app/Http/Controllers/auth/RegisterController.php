<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'username' => $req->username,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        Auth::attempt($req->only('email', 'password'));

        return redirect()->route('home');

    }
}
