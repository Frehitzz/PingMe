<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function __invoke(Request $request)
    {
        // Validate the input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        /*Attempt to log in
         Auth::attempt($credentials - takes the email and password then 
         automatically hashed the paswd and compare it to the hasd pswd 
         in the database

         $request->boolean('remember') - will set a long-lived cookie so
         the users stay logged in when they close their browser
         */

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenerate session for security
            // generate a new session cookie when they login
            $request->session()->regenerate();

            // Redirect to intended page or home
            // if someone go to /pings without logging in they will redirecet to homepage
            return redirect()->intended('/')->with('success', 'Welcome back!');
        }

        // If login fails, redirect back with error
        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->onlyInput('email');
    }
}