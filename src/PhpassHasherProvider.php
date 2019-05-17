<?php
namespace jhonyspicy\LaravelWordpressLogin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

class PhpassHasherProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        Hash::extend('phpass', function (Application $app) {
            return new PhpassHasher($this->app['config']['hashing.phpass'] ?? []);
        });
    }
}
