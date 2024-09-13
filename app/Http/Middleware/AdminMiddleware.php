<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect("/");
        }

        $position = Auth::user()->position;
        $actions = [
            'ADMIN' => fn ($request) => $next($request),
            'MANAGER' => fn () => redirect()->route('auth2.dashboard'),
            'EMPLOYEE||HR' => fn () => redirect()->route('EmpDashboard'),
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
