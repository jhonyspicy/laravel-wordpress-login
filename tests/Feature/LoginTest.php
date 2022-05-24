<?php

namespace jhonyspicy\LaravelWordpressLogin\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use jhonyspicy\LaravelWordpressLogin\Tests\Resource\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function userLogin()
    {
        $user = User::factory()->create([
            'password' => Hash::make('secret'),
        ]);

        $this->assertCount(1, User::all());

        $credentials = ['email' => $user->email, 'password' => 'secret'];
        $guard = auth()->guard();
        $isLogin = $guard->attempt($credentials);

        $this->assertTrue($isLogin);
    }
}