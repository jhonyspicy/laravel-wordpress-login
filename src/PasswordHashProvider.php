<?php
namespace jhonyspicy\LaravelWordpressLogin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

class PasswordHashProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->registerResources();


        Hash::extend('phpass', function (Application $app) {
            return new PhpassHasher($this->app['config']['hashing.phpass'] ?? []);
        });
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
