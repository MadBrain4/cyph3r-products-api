<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserLanguageController;
use App\Http\Middleware\AuthApiMiddleware;
use App\Http\Middleware\SetUserLocale;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware([SetUserLocale::class, AuthApiMiddleware::class])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    

    Route::get('/user/language', [UserLanguageController::class, 'getLanguage']);
    Route::put('/user/language', [UserLanguageController::class, 'updateLanguage']);
});
