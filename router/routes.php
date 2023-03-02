<?php

use App\Controllers\AuthenticateController;
use App\Middleware\CsrfVerifier;
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::csrfVerifier(new CsrfVerifier());
SimpleRouter::get('/login', [AuthenticateController::class, 'index']);


SimpleRouter::error(function (Request $request, \Exception $exception) {
    return match ($exception->getCode()) {
        default => response()->json(['error' => $exception->getMessage(), 'code' => $exception->getCode()])
    };
});