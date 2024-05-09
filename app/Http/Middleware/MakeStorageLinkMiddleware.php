<?php

namespace App\Http\Middleware;

use Closure;

class MakeStorageLinkMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->isMethod('get')){

            $data = glob(public_path('storage'.DIRECTORY_SEPARATOR.'*'));

            $status = empty($data);
            view()->share('hasStorageLink', $status);

            if( file_exists($path = public_path('storage')) ){
              //  @unlink($path);
            }
        }

        return $next($request);
    }
}
