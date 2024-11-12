<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        Fortify::loginView(function () {
            return view('user::auth.login');
        });

        Fortify::registerView(function () {
            return view('user::auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('user::auth.forgot-password');
        });

        Fortify::resetPasswordView(function () {
            return view('user::auth.reset-password');
        });

    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
