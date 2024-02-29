<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException)
            return $this->invalidJson($request, $exception);

        if ($exception instanceof QueryException)
            return response()->json([
                "errors" => [
                    "status" => "500",
                    "title" => "Database Error",
                    "detail" => "Error procesando la respuesta"
                ]
            ], 500);

        return parent::render($request, $exception);

    }
}
