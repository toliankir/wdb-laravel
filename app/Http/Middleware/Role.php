<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param null $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        if ($request->user()) {
            if ($request->user()->isAdmin()) {
                return $next($request);
            }

            foreach ($request->user()->getPermissions() as $permission) {
                if ($permission->permission[0] === '!') {
                    $pattern = '/' . str_replace('*', '.*', str_replace('/', '\/', ltrim($permission->permission, '!'))) . '/';
                    if (preg_match($pattern, $request->getPathInfo())) {
                        return redirect('/');
                    }
                } else {
                    $pattern = '/' . str_replace('*', '.*', str_replace('/', '\/', $permission->permission)) . '/';
                    if (preg_match($pattern, $request->getPathInfo())) {
                        return $next($request);
                    }
                }
            }
        }

        return $next($request);
    }
}
