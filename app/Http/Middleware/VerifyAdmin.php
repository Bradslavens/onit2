<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyAdmin
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
        $user = \App\User::find(Auth::id());
        
        if($user->role !== 'admin')
        {
            session()->flash('message', 'Sorry, you do not have permission to access that page :(');

            return redirect(route('login'));
        }

        return $next($request);
    }
}
