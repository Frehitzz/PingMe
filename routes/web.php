<?php

use App\Http\Controllers\PingController;
use Illuminate\Support\Facades\Route;

// Routing looks like in laravel
Route::get('/', [PingController::class, 'index']);
