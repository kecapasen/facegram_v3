<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::post('/v1/auth/register', [AuthController::class, 'register']);
Route::post('/v1/auth/login', [AuthController::class, 'login']);
Route::delete('/v1/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/v1/posts', [PostController::class, 'store'])->middleware('auth:sanctum');

Route::post('/v1/users/{username}/follow', [FollowingController::class, 'follow'])->middleware('auth:sanctum');
Route::delete('/v1/users/{username}/unfollow', [FollowingController::class, 'unfollow'])->middleware('auth:sanctum');
Route::get('/v1/users/following', [FollowingController::class, 'index'])->middleware('auth:sanctum');

Route::put('/v1/users/{username}/accept', [FollowerController::class, 'accept'])->middleware('auth:sanctum');
Route::get('/v1/users/{username}/followers', [FollowerController::class, 'index'])->middleware('auth:sanctum');

Route::get('/v1/users', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::get('/v1/users/{username}', [UserController::class, 'show'])->middleware('auth:sanctum');
