<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Route;

class BeforeExploringChangePwd {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $sRoute = 'admin-users.change-password';
        if (Session::get('force_change_pwd') && $sRoute != Route::currentRouteName()) {
            return redirect()->route($sRoute);
        }
        return $next($request);
    }
}
