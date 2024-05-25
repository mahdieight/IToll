<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use App\Facades\Response;
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
        if ($exception instanceof BadRequestException) {
            return $this->renderError($exception, 400 , null , [] , $exception->data);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->renderError($exception, 401);
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->renderError($exception, 404);
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->renderError($exception, 404, __('error.url_not_found'));
        }

        if ($exception instanceof ModelNotFoundException) {
            return $this->renderError($exception, 404, __('error.resource_not_found'));
        }

        if ($exception instanceof UnauthorizedException) {
            return $this->renderError($exception, 401, __('auth.errors.an_authentication_error_occurred'));
        }

        // if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
        //     return $this->renderError($exception, 403, __('auth.errors.user_doesnt_have_role'));
        // }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->renderError($exception, 403, __('errors.method_not_allowed'));
        }

        if ($exception instanceof ValidationException) {
            return $this->renderError($exception, 422, __('errors.the_sent_parameters_are_invalid'),  $exception->errors());
        }

        if ($exception instanceof ThrottleRequestsException) {
            return $this->renderError($exception, 429, __('errors.too_many_request'));
        }

        return $this->renderError(
            $exception,
            500,
            null,
            app()->isProduction() ? [] : $exception->getTrace()
        );
    }

    private function renderError(Throwable $exception, $status, ?string $message = null, $errors = [], $data = [])
    {
        return Response::status($status)
            ->message($message ? $message : $exception->getMessage())
            ->data($data)
            ->errors($errors);
    }
}
