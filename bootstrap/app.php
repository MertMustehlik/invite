<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('portal/')
                ->name('portal.')
                ->group(base_path('routes/portal.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->is('portal') || $request->is('portal/*')) {
                return route('portal.auth.login');
            }
        });
        $middleware->redirectUsersTo(function (Request $request) {
            if ($request->is('portal') || $request->is('portal/*')) {
                return route('portal.dashboard.index');
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ValidationException $e) {
            $errors = array_values($e->errors());

            return response()->json([
                'message' => isset($errors[0]) && isset($errors[0][0]) ? $errors[0][0] : __('form_has_errors'),
                'errors' => $e->errors(),
            ], 422);
        });

        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('portal') || $request->is('portal/*')) {
                return redirect()->route('portal.auth.login');
            }

            return response()->json([
                'message' => __('unauthenticated')
            ], 401);
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('portal') || $request->is('portal/*')) {
                //404 pagesi yapılabilir return redirect()->route('pages.404');
                dd(__('Page_not_found'));
            }

            return response()->json([
                'message' => __('Page_not_found')
            ], 404);
        });
    })->create();
