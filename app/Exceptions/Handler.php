<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    protected function unauthenticated($request, AuthenticationException $exception)
{
    if ($request->expectsJson()) {
        return response()->json([
            'message' => $exception->getMessage(),
        ], 401);
    }

    return redirect()->guest($exception->redirectTo() ?? route('login'));
}
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
