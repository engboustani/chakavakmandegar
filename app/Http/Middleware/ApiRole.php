<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class ApiRole
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  Closure $next
	 * @param  $roles
	 * @return mixed
	 */
    public function handle($request, Closure $next, $roles)
    {
        $user = Auth::user();
        if(!$user->hasRole(explode('|', $roles)))
        {
            return response()->json([
                'roles' => explode('|', $roles)
            ], 403);
        }

        return $next($request);
    }
}
