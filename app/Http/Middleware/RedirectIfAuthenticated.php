<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @param string|null ...$guards
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards): Response|RedirectResponse
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            if ($user) {
                if ($user->hasRole('admin') || $user->hasRole('super-admin')) {
                    // Redirect to the admin dashboard for admin roles
                    return redirect()->intended('/admin/dashboard');
                } else {
                    // Redirect to a general route for other authenticated users
                    return redirect()->intended('/');
                }
            }
        }
    }
        return $next($request);
    }
}
