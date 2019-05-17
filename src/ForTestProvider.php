<?php


namespace jhonyspicy\LaravelWordpressLogin;


use Illuminate\Support\ServiceProvider;

class ForTestProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
