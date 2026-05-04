<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request; // <-- MUST ADD THIS
use Illuminate\Support\Facades\Auth; // <-- MUST ADD THIS
use Illuminate\Support\Facades\Hash; // <-- MUST ADD THIS

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // User - is the name of model for user User.php
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // log them in
        Auth::login($user);

        return redirect('/')->with('success', 'Welcome to Pingme!');
    }
}
