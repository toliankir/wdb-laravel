<?php

namespace App\Http\Middleware;

use Closure;
use SplFixedArray;
use App\Helpers\Helper;

class Test
{

    public function splFixedArrayPush(SplFixedArray $array, $value)
    {
        for ($i = $array->count() - 1; $i !== 0; $i--) {
            $array[$i] = $array[$i - 1];
        }
        $array[0] = $value;
        return $array;
    }
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
            $links = session('urlHistory') ?? new SplFixedArray(5);
            $links = $this->splFixedArrayPush($links, $request->fullUrl());
            session(['urlHistory' => $links]);
        }
        return $next($request);
    }
}
