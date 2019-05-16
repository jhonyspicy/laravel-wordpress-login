<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use jhonyspicy\LaravelWordpressLogin\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'password'          => Hash::make('secret'),
    ];
});

