<?php
namespace jhonyspicy\LaravelWordpressLogin;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = [];
}