<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // dd($request->all());
        return $request->expectsJson() ? null : route('admin.login_page');
        // if (! $request->expectsJson()) {
        //     return route('admin.login_page');
        // }

        // if ($request->expectsJson()) {
        //     // Handle JSON response
        //     return $next($request);
        // } else {
        //     // Handle non-JSON response
        //     return redirect()->route('admin.login_page');
        // }
    }
}
