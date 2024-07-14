<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CleanSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->path() == "warga" || $request->path() == "cargas") {
            $request->session()->forget(['warga1','warga2','editWarga1','editWarga2','cargas1','cargas2','cargas3']);
        }
        return $next($request);
    }
}
