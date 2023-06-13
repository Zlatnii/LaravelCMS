<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }elseif (Auth::check() && Auth::user()->role >= 2) {
            if ($request->is('pages') || $request->is('pages/*')) {
                return $next($request);
            }
            return redirect('/pages');
        }
        
        abort(403, 'ACCESS DENIED! YOU ARE NOT ALLOWED TO ACCESS THIS PAGE!');
    }
}
