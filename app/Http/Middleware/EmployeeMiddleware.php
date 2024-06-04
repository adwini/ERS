<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            abort(401);
        }

        $position = Auth::user()->position;

        $actions = [
            'EMPLOYEE' => fn ($request) => $next($request),
            'MANAGER' => fn () => redirect()->route('auth2.dashboard'),
            'ADMIN' => fn () => redirect()->route('dashboard'),
        ];

        if (isset($actions[$position])) {
            return $actions[$position]($request);
        } else {
            abort(401);
        }
    }
}
