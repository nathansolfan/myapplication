<?php

namespace App\Http\Controllers;

// Request is used to grab data

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // after creating the route in web.php
    // Request $request creates an instance
    // To get a DATE from the form ($request->username) ex: dd($request->username);
    public function register(Request $request)
    {
        // VALIDATE
        $fields = $request->validate([
            'username' => ['required','max:255'],
            'email' => ['required','max:255', 'email', 'unique:users'],
            'password' => ['required','max:255', 'confirmed'],
        ]);

        // dd($fields);

        // REGISTER - takes an array username => $request->username
        $user = User::create($fields);

        // LOGIN - use ::login method and the User, put it in a var
        Auth::login($user);





        // REDIRECT
        return redirect()->route('home');
        dd('ok');

    }
}
