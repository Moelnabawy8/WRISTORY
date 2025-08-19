<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            
            if ($request->is('admin/*')) {
                return route('admin.login');
            }

            
            if ($request->is('seller/*')) {
                return route('seller.login');
            }

            
            return route('web.login');
        }

        return null;
    }
}
