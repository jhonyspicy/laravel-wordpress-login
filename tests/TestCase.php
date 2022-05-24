<?php
namespace jhonyspicy\LaravelWordpressLogin\Tests;

use Illuminate\Foundation\Application;
use jhonyspicy\LaravelWordpressLogin\PhpassHasherProvider;
use jhonyspicy\LaravelWordpressLogin\Tests\Resource\Provider;
use jhonyspicy\LaravelWordpressLogin\Tests\Resource\User;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        try {
            $this->withFactories(__DIR__ . '/../database/factories');
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }


    protected function resolveApplication(): Application
    {
        $app = parent::resolveApplication();

        $app->useEnvironmentPath(__DIR__ . '/../');

        return $app;
    }

    /**
     * @param Application $app
     *
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app)
    {
        return [
            Provider::class,
            PhpassHasherProvider::class,
        ];
    }

    /**
     * configの値を書き換える。
     *
     * @param \Illuminate\Foundation\Application $app
     */
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