<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use jhonyspicy\LaravelWordpressLogin\Tests\Resource\User;

class UserFactory extends Factory
{
    public function definition(): array
    {
        static::$modelNameResolver = function (self $factory) {
            return User::class;
        };

        return [
            'name'     => $this->faker->name(),
            'email'    => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('secret'),
        ];
    }
}
