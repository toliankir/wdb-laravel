<?php

namespace App\Http\Middleware;

use Closure;
use SplFixedArray;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if ($request->user()) {
                $links = session()->has('backLiks') ? session('backLinks') : new SplFixedArray(3);
                // $links->push('test');
                var_dump($links);
                session('backLinks', $links);
                // echo $request->user()->roleIs();
            }
            
            return $next($request);
    }
}
