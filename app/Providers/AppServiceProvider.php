<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //midleware
        Gate::define('admin', function ($user) {
            return $user->roles == 'admin';
        });

        Gate::define('s_admin', function ($user) {
            return $user->roles == 's_admin';
        });

        Gate::define('pembeli', function ($user) {
            return $user->roles == 'pembeli';
        });
    }
}
