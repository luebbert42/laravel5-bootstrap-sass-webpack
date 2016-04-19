<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        $e->getCode() == 0 ? $code = 500 : $code = $e->getCode();

        if($request->wantsJson()) {
            \Log::error($e);
            $json = [
                'success' => false,
                'error' => [
                    'code' => $code,
                    'message' => $e->getMessage(),
                    'timestamp' => date('Y-m-d H:i:s')
                ],
            ];
            return response()->json($json,  $code);
        }

        // 404 page when a model is not found
        if (($e instanceof ModelNotFoundException) && (!\Config::get('app.debug'))) {
            return response()->view('errors.404', [], 404);
        }


        if (($e instanceof NotFoundHttpException) && (!\Config::get('app.debug'))) {
            return response()->view('errors.404', [], 404);
        }


        if ($this->isHttpException($e)) {
            return $this->renderHttpException($e);
        } else {
            // Custom error 500 view on production
            if (app()->environment() == 'production') {
                return response()->view('errors.500', [], 500);
            }
            return parent::render($request, $e);
        }

    }
}
