# VdmScraper
A scraper of viedemerde.fr posts made with Lumen

## Install
Install dependencies by running `composer install`.

Then run `php artisan migrate` to setup the database

##  Scraping
You can use the command `php artisan scrap` to get the latest posts from VDM website.
you can also specify the number of posts by using the option  `--count[=COUNT]`
the default and max value is 200

## Api
Use can request `/api/posts` to get all posts or `/api/posts/{id}` to get a specific post

## Test
To run test use `vendor/bin/phpunit`


### Lumen PHP Framework
[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)
