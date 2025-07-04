<?php

use App\Http\Middleware\SetUserLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(SetUserLocale::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->renderable(function (AuthorizationException $e) {
            return response()->json([
                'message' => __('messages.forbidden'),
            ], 403);
        });

        $exceptions->renderable(function (AccessDeniedHttpException $e) {
            return response()->json([
                'message' => __('messages.forbidden'), 
            ], 403);
        });
        

        $exceptions->renderable(function (ModelNotFoundException $e) {
            return response()->json([
                'message' => __('messages.model_not_found'),
            ], 404);
        });

        $exceptions->renderable(function (NotFoundHttpException  $e) {
            return response()->json([
                'message' => __('messages.model_not_found'),
            ], 404);
        });

        $exceptions->renderable(function (TokenExpiredException $e) {
            return response()->json([
                'message' => __('messages.token_expired'),
            ], 403);
        });
    })->create();
