<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CarouselController;
use App\Http\Controllers\API\TodolistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource("users", UserController::class); // Les routes "users.*" de l'API
Route::apiResource("todolists", TodolistController::class); // Les routes "todolists.*" de l'API
Route::apiResource("carousels", CarouselController::class); // Les routes "carousels.*" de l'API