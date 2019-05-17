# laravel-wordpress-login
(I'm not good at English...)

[![Total Downloads](https://poser.pugx.org/jhonyspicy/laravel-wordpress-login/downloads)](https://packagist.org/packages/jhonyspicy/laravel-wordpress-login)
[![Latest Stable Version](https://poser.pugx.org/jhonyspicy/laravel-wordpress-login/v/stable)](https://packagist.org/packages/jhonyspicy/laravel-wordpress-login)
[![License](https://poser.pugx.org/jhonyspicy/laravel-wordpress-login/license)](https://packagist.org/packages/jhonyspicy/laravel-wordpress-login)

login with user data created by wordpress


## Laravel

You can install this package via composer
```bash
composer require jhonyspicy/laravel-wordpress-login
```

edit `config/hashing.php` like below
```php:config/hashing.php
return [
    // change default driver to 'phpass'
    'driver' => 'phpass',
    ...
    ...
    ...
    // add phpass setting
    'phpass' => [
        'iteration_count' => 8,
        'portable_hashes' => true,
    ],
];
```


