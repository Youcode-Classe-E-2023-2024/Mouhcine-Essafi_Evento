<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use Closure;

class OrganizerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->hasRole('organizer')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
