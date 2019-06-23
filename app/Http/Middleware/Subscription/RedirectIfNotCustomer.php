<?php

namespace App\Http\Middleware\Subscription;

use Closure;

class RedirectIfNotCustomer
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
        // if(!auth()->user()->isCutomer()){
        //     return redirect()->route('account.index');
        // }
        return $next($request);
    }
}
