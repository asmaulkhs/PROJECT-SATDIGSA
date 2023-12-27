<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next, ...$allowedJabatanIds)
    {
        $user = Auth::user();

        if (in_array($user->jabatan_id, $allowedJabatanIds)) {
            return $next($request);
        }

        abort(403, 'Unauthorized.'); // Sesuaikan dengan respons error yang sesuai.
        // if (auth()->check() && auth()->user()->jabatan_id == $jabatan_id) {
        // return $next($request);
    

    }
}
