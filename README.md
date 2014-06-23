Laravel Library for NewRelic Insight
===================================

This is a Laravel Library for Interacting with NewRelic's Insight. This tries to make you define simple events in Laravel-way and make 
it appear in the NewRelic Insights dashboards.

Features
--------

* PSR-0 autoloading compliant structure
* Unit-Testing with PHPUnit
* PHPDocumentor


Requirements
------------

* cURL
* PHP >= 5.3.0

Usage
-----

Require the package in your composer.json file

    composer require buonzz/l4-newrelic-insight:dev-master
Add the service provider and facade in your config/app.php
Service Provider

    Buonzz\NewRelic\Insight\Laravel4\ServiceProviders\InsightServiceProvider
Facade

    'Insight'            => 'Buonzz\NewRelic\Insight\Laravel4\Facades\Insight',



