<?php

namespace jhonyspicy\LaravelWordpressLogin\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use jhonyspicy\LaravelWordpressLogin\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function サンプルデータでログイン()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('secret')
        ]);

        $this->assertCount(1, User::all());

        $credentials = ['email' => $user->email, 'password' => 'secret'];
        $guard = auth()->guard();
        $isLogin = $guard->attempt($credentials);

        $this->assertTrue($isLogin);
    }
}