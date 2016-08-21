# MAGENTO v2.x.x REST API

##Demo video: 
<code><laravel-root>/DEMO/app.zip</code>
##App is using: 
* Laravel 5.2 Framework
* Bootstrap 3
* jquery/ajax plugins: (sweetalert/modal boxes/cookie.js) 
* gulp js taskrunner
* LESS
* etc


##Setup:
* clone repo
* composer install
* install magento 2.x.x (develop branch recommended as of now)
* add a  new magento user and add the needed roles (or just use admin account for testing only)
* add Magento sample data (recommended) or manually add some testing data
* in Laravel repo setup settings located at: app/config/settings.php
* terminal/bash in Laravel dir root: <code>php artisan serve</code>  - to start local server


## optional todo's
* request caching/caching in general
* delete tracking (only works on develop branch as of now)

## Known Magento current stable release issues:
* https://github.com/magento/devdocs/issues/527
* https://github.com/magento/magento2/issues/4246
* http://stackoverflow.com/questions/32732071/install-magento2-with-sample-data

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
