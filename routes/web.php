<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\PingController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

// Routing looks like in laravel
Route::get('/', [PingController::class, 'index']);

// grouped middleware for store,edit,update,edit,destroy
Route::middleware('auth')->group(function(){ 
Route::post('/addping', [PingController::class, 'store']);
Route::get('/ping/{ping}/edit', [PingController::class, 'edit']);
Route::put('/ping/{ping}', [PingController::class, 'update']);
Route::delete('/ping/{ping}', [PingController::class, 'destroy']);
});


// Register Routes
Route::view('/register', 'auth.register')
// is the user logout? yes-> see the register page else user login they are drected to home page
    ->middleware('guest')
// naming the route url so you can just use this name whenever you change the file path
    ->name('register');
Route::post('/register', UserController::class)
    ->middleware('guest');

    // logout
Route::post('/logout', LogoutController::class)
->middleware('auth');
