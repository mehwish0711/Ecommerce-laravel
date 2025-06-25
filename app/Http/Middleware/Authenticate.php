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
        if (! $request->expectsJson()) {

            // 👉 Check frontenduser route (cart, shop, user etc.)
            if ($request->is('cart*') || $request->is('shop*') || $request->is('user*')) {
                return route('frontenduser');
            }

            // 👉 Default fallback (admin login)
            return route('login');
        }

        return null;
    }
}
