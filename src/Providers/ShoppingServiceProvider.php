<?php

namespace Ingenious\Shopping\Providers;

use Ingenious\Shopping\Billing\PaymentGateway;
use Ingenious\Shopping\Shopping;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class ShoppingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // config
        $this->publishes([
            __DIR__.'/../config/shopping.php' => config_path('shopping.php')
        ], 'config');

        // routes
        $this->loadRoutesFrom(__DIR__.'/../routes/shopping.php');

        // migrations
        $this->loadMigrationsFrom(__DIR__.'/../Migrations/');

        // views
        $this->loadViewsFrom(__DIR__.'/../views', 'shopping');

        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/ingenious/shopping'),
        ]);

        // factories
        $this->loadEloquentFactoriesFrom(__DIR__.'/../factories');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Shopping', function() {
            return new Shopping;
        } );

        $this->app->singleton('PaymentGateway', function() {
            return new PaymentGateway;
        });
    }

    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    protected function loadEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }
}
