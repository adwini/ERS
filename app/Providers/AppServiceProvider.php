<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::define('GenMan', function (User $user) {
        return $user->roles === 'General Manager';
        });
        Gate::define('Manager', function (User $user) {
            return $user->roles === 'Manager';
        });
        Gate::define('employee', function (User $user) {
            return $user->roles === 'employee';
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
