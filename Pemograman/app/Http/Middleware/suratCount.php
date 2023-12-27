<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Surat;

class suratCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $jabatan = optional($user)->jabatan_id;
        if($jabatan == 1){
            $suratCount = surat::where('status_id',2)->where('tujuan_id', '1')->count();
            View::share('suratCount', $suratCount);
        }elseif($jabatan == 2){
            $suratCount = surat::where('status_id',2)->where('tujuan_id', '2')->count();
            View::share('suratCount', $suratCount);
        }elseif($jabatan == 3){
            $suratCount = surat::where('status_id',2)->where('tujuan_id', '3')->count();
            View::share('suratCount', $suratCount);
        }elseif($jabatan == 4){
            $suratCount = surat::where('status_id',2)->where('tujuan_id', '4')->count();
            View::share('suratCount', $suratCount);
        }

        return $next($request);
    }
}
