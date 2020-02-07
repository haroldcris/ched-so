<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;

class CheckForAdminRole
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
        if (\Auth::guest()) {
            return redirect()->guest('login');

        } else{

            $user = \Auth::user();

            if($user && $user->role == Role::Admin)        
                return $next($request);
            else
                abort(404);
        }
    }
}
