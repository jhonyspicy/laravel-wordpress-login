<?php
namespace jhonyspicy\LaravelWordpressLogin\Tests;

use jhonyspicy\LaravelWordpressLogin\PasswordHashProvider;
use jhonyspicy\LaravelWordpressLogin\User;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__ . '/../database/factory');
    }


    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            PasswordHashProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testdb');
        $app['config']->set('database.connections.testdb', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);

        $app['config']->set('auth.providers.users.model', User::class);

        $app['config']->set('hashing.driver', 'phpass');
        $app['config']->set('hashing.phpass', [
            'iteration_count' => 8,
            'portable_hashes' => true,
        ]);
    }
}