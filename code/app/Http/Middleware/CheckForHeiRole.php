<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;

class CheckForHeiRole
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
        $user = \Auth::user();
        if($user && $user->role == Role::HEI)        
            return $next($request);
        else
            abort(404);
    }
}
