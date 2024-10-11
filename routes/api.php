<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ActivityController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [RegisterController::class, 'register']); //create user
Route::post('/login', [RegisterController::class, 'login']);//login
Route::post('/logout', [RegisterController::class, 'logout'])->middleware('auth:sanctum');//logout
//Notification
Route::get('/notifications', [NotificationController::class, 'index1']);//notification show user

Route::post('/activities', [ActivityController::class, 'store']);//Activity Registration