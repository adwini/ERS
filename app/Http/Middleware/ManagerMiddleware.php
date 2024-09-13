<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ManagerMiddleware
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
            'MANAGER' => fn ($request) => $next($request),
            'EMPLOYEE||HR' => fn () => redirect()->route('EmpDashboard'),
            'ADMIN' => fn () => redirect()->route('dashboard'),
        ];

        foreach ($actions as $roles => $action) {
            $rolesArray = explode('||', $roles);
            if (in_array($position, $rolesArray)) {
                return $action($request);
            }
        }

        // If no matching role found, abort with unauthorized status
        abort(401);
    }
}
