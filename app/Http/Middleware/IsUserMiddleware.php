<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\UserStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*check for user*/
        if (auth('web')->check() && auth('web')->user()->role_id == Role::where('name', 'user')->first()->id && auth('web')->user()->status_id == UserStatus::where('name', 'Active')->first()->id) {
            return $next($request);
        }else{
            /*logout*/
            auth('web')->logout();
            abort(401);
        }
    }
}
