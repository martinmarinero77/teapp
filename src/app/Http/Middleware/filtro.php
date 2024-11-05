<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class filtro
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //ask the request has a query parameter named 'filtro', allow the request to continue, if not,
        //return a 404 response
        if ($request->has('filtro')) {
                return response('Not Found',404);
            }
            return $next($request);
    }
}
