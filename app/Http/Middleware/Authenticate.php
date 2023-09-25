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
        if ($request->session()->has('lastActivity') && time() - $request->session()->get('lastActivity') > config('session.lifetime') * 60) {
            // Redirect the user to a specific page
            return redirect('/admins/all');
        }
        return $request->expectsJson() ? null : route('admin.login');
    }

}