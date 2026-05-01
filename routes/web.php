<?php

use App\Http\Controllers\PingController;
use Illuminate\Support\Facades\Route;

// Routing looks like in laravel
Route::get('/', [PingController::class, 'index']);
Route::post('/addping', [PingController::class, 'store']);
// EDIT, UPDATE, AND DELETE FEATURE
Route::get('/ping/{ping}/edit', [PingController::class, 'edit']);
Route::put('/ping/{ping}', [PingController::class, 'update']);
Route::delete('/ping/{ping}', [PingController::class, 'destroy']);
