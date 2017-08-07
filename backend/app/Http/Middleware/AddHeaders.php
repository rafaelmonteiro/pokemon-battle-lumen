<?php

namespace App\Http\Middleware;

use Closure;

class AddHeaders
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
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin','http://localhost:8080');        
        $response->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS');
        $response->header('Access-Control-Allow-Headers', "x-requested-with, Content-Type, origin");
        return $response;
    }
}
