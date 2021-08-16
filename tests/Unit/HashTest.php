<?php

namespace jhonyspicy\LaravelWordpressLogin\Tests;

use Illuminate\Support\Facades\Hash;

class HashTest extends TestCase
{
    /** @test */
    public function ハッシュのチェック()
    {
        $this->assertTrue(Hash::check('yPxOG(7NW77%b!v%CMwQP#MW', '$P$BAEJQxlgehZdSE8bHGrajhFHfj0Y/20'));
        $this->assertTrue(Hash::check('RKTUABPdDkX1*HCuD@*3DStp', '$P$BQKoPo5GBV8i/F3x9YF2XL41dDeYKb.'));
        $this->assertTrue(Hash::check('3^VD$aS0UE!jmgOFJyOsrVOV', '$P$B03MJ7MT2BF.3mGcNReyWPHfRzYa.N0'));
        $this->assertTrue(Hash::check('DH!7Shf@gwHxhtN55bSJ3U@*', '$P$BjQFL3WuTQQOi5Qi4qyuGo5vdH176a/'));
        $this->assertTrue(Hash::check('#5GsH0zRrX*%l&DeHg15hHei', '$P$BRUES.82VoHXhP5SY2Kkl0tlFQgRm80'));
    }

    /** @test */
    public function 正しくハッシュ化できる()
    {
        $hashed1 = Hash::make('1234');
        $hashed2 = Hash::make('1234');

        $this->assertNotEquals($hashed1, $hashed2);

        $this->assertMatchesRegularExpression('/^\$(P|H)\$/', $hashed1);
        $this->assertMatchesRegularExpression('/^\$(P|H)\$/', $hashed2);
    }
}