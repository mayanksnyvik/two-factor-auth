<?php

namespace Mayanksnyvik\TwoFactorAuth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Mayanksnyvik\TwoFactorAuth\Http\Middleware\TwoFactorAuthenticationMiddleware;

class TwoFactorServiceProvider extends ServiceProvider
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
        if (!class_exists(\Laravel\Ui\UiServiceProvider::class)) {
            throw new \Exception('Laravel UI is required for this package. Please install it via "composer require laravel/ui".');
        }

        $this->app['router']->aliasMiddleware('2fa',\Mayanksnyvik\TwoFactorAuth\Http\Middleware\TwoFactorAuthenticationMiddleware::class);
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views','mayanksnyvik.two-factor-auth');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
