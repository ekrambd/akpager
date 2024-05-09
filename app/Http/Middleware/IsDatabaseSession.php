<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class IsDatabaseSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (env('APP_INSTALLED') && env('SESSION_DRIVER') == 'database') {
            return $next($request);
        }

        throw new HttpException(403, 'Forbidden: Session driver is not database. Update .env file');
    }
}
