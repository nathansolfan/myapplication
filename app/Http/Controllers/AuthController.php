<?php

namespace App\Http\Controllers;

// Request is used to grab data

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // after creating the route in web.php
    // Request $request creates an instance
    // To get a DATE from the form ($request->username) ex: dd($request->username);

    // REGISTER
    public function register(Request $request)
    {
        // VALIDATE
        $fields = $request->validate([
            'username' => ['required','max:255'],
            'email' => ['required','max:255', 'email', 'unique:users'],
            'password' => ['required','max:255', 'confirmed'],
        ]);

        // REGISTER - takes an array username => $request->username
        $user = User::create($fields);

        // LOGIN - use ::login method and the User, put it in a var
        Auth::login($user);

        event(new Registered($user));

        // REDIRECT
        return redirect()->route('home');
    }

    // email Verify Notice handler
    public function verifyNotice () {
        return view('auth.verify-email');
    }

     // email Verification Handler
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard');
    }

    // Resending email verification Handler
    public function verifyHandler(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }



    // LOGIN FUNCTION
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required','max:255', 'email'],
            'password' => ['required'],
        ]);


        // TRY TO LOG - attempt() method
       if(Auth::attempt($fields, $request->remember)) {
        // redirect home if ok. route('home') - intended() empty or choose a route
        return redirect()->intended('dashboard');
       } else {
        return back()->withErrors([
            'failed' => 'The provied credentials don`t match - AuthController by me'
        ]);
       }
    }

    // LOGOUT
    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
