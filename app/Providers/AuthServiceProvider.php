<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    Gate::define('admin', function (User $user) {
        return $user->role === 'admin';
    });
    Gate::define('sinhvien', function (User $user) {
        return $user->role === 'sinh_vien';
    });
    Gate::define('giangvien', function (User $user) {
        return $user->role === 'giang_vien';
    });

    }
}
