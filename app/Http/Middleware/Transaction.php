<?php

namespace App\Http\Middleware;

use Closure;

class Transaction
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
        echo "hello";
        var_dump($request->all());
        die();
    }
}
