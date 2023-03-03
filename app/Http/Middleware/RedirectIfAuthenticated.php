<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\UserStatus;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                /*check user status*/
                if (\auth('web')->check() && \auth()->user()->role_id == Role::where('name', 'admin')->first()->id) {
                    return redirect()->route('admin.dashboard');
                }
                if (\auth('web')->check() && \auth()->user()->role_id == Role::where('name', 'user')->first()->id) {
                    return redirect()->route('user.dashboard');
                } else {
                    abort(401);
                }
            }
        }

        return $next($request);
    }
}
