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

            $action = explode('@', $request->route()->getAction()['controller']);
            $userActions = $request->user()->getRole()->getActions;

            if ($userActions->where('controller', $action[0])->where('method', $action[1])->count() > 0) {
                return $next($request);
            }

            return redirect('/');
        }

        return $next($request);
    }
}
