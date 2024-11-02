<?php

namespace Uadevteampackages\LaravelUserProxy\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LaravelUserProxyMiddleware
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
        
        $app_env = env('APP_ENV');

        // if $app_env is anything other than 'local', 'test', 'dev', do not allow access

        if ($app_env != 'local' && $app_env != 'test' && $app_env != 'dev') {
            
            abort(403);

        }

        else {

            return $next($request);

        }
    }
}
