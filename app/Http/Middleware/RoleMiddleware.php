<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        string ...$role
    ){

    foreach ($role as $r) {
        if (auth()->check() && auth()->user()->role->name == $r) {
            // Role matched, proceed to the next request
            return $next($request);
        }
}


if (auth()->check()) {
    $user = auth()->user();

    // Redirect Admin to the dashboard
    if ($user->role->name == 'Admin') {
        return redirect('/dashboard');
    }

    // Redirect Customer to the homepage
    if ($user->role->name == 'Customer') {
        return redirect('/');
    }
}

// If the user is not authorized or does not have a matching role
abort(403, "Unauthorized access");
}
}
