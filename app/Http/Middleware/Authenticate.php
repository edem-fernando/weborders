<?php

namespace App\Http\Middleware;

use App\Http\Controllers\WebController;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        $controller = new WebController();
        $check = $controller->checkLogin($request->login, $request->password);
        if (!$check) {
            return json_encode($controller->message()->toArray());
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
