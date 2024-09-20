<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        $user = Auth::guard($guard)->user();

        if ($guard === 'root' && !$user->isRoot()) {
            return redirect('/home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        if ($guard === 'operator' && !$user->isOperator()) {
            return redirect('/home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        if ($guard === 'admin' && !$user->isAdmin()) {
            return redirect('/home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
