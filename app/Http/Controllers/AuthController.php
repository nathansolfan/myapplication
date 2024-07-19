<?php

namespace App\Http\Controllers;

// Request is used to grab data

use App\Models\User;
use Illuminate\Http\Request;

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
            'email' => ['required','max:255', 'email'],
            'password' => ['required','max:255', 'confirmed'],
        ]);

        // dd($fields);

        // REGISTER - takes an array username => $request->username
        User::create($fields);

        dd('ok');

    }
}
