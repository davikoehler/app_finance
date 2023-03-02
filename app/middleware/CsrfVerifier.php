<?php

namespace App\Middleware;

use Pecee\Http\Middleware\BaseCsrfVerifier;

class CsrfVerifier extends BaseCsrfVerifier
{
    protected $except = ['/api/*'];
}