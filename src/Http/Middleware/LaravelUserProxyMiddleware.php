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
        $lup_allowed_usernames = explode(',', env('LUP_ALLOWED_USERNAMES', ''));
        $lup_allowed_usernames = array_map('trim', $lup_allowed_usernames);


        if (session('proxy_mode') == true) {

            $real_ms_username = session('real_ms_username');
            if (!in_array($real_ms_username, $lup_allowed_usernames)) {
                
                abort(403);
        
            }
        }
        
        elseif (session('proxy_mode') == false) {

            $username = session('ms:username');
            if (!in_array($username, $lup_allowed_usernames)) {
                
                abort(403);

            }
        }

        return $next($request);
    }
}
