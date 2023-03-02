<?php

namespace App\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthenticateMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
    }
}