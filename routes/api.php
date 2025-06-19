<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

     Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);         
        Route::post('/', [ProductController::class, 'store']);           
        Route::get('/{id}', [ProductController::class, 'show']);       
        Route::put('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);

        Route::get('/{id}/prices', [ProductController::class, 'prices']);
        Route::post('/{id}/prices', [ProductController::class, 'addPrice']);
    });
});
