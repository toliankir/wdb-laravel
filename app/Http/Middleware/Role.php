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
    public function handle($request, Closure $next, $role = null)
    {
//        var_dump($request->getPathInfo());
//        $request->user()->test('123');
        if ($request->user()) {
//            if ($role !== $request->user()->roleIs->role) {
//            return redirect('/');
//            }

        }

        return $next($request);
    }
}
