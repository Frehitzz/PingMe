<?php

use Illuminate\Support\Facades\Route;

// Routing looks like in laravel
Route::get('/', function () {
    return view('home'); // "home" is the name of file on view home.blade.php
});
