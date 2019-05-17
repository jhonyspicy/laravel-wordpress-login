<?php
namespace jhonyspicy\LaravelWordpressLogin\Tests\Resource;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = [];
}