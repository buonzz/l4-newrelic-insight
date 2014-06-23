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
* Valid NewRelic Account ID - see http://newrelic.com/
* NewRelic Insight API Query Key - see http://docs.newrelic.com/docs/insights/remote-queries
* NewRelic Insight API Insert Key - see http://docs.newrelic.com/docs/insights/inserting-events

Installation
------------

Require the package in your composer.json file

    composer require buonzz/l4-newrelic-insight:dev-master
Add the service provider and facade in your config/app.php
Service Provider

    Buonzz\NewRelic\Insight\Laravel4\ServiceProviders\InsightServiceProvider
Facade

    'Insight'            => 'Buonzz\NewRelic\Insight\Laravel4\Facades\Insight',

Usage
-----

Set the account id's and keys.

    Insight::setAccountID('<put your account id here>'); // used to associate your account to calls
    Insight::setQueryKey('<put your query key here>'); // required to query data
    Insight::setInsertKey('<put your insert key here>'); // this is when you need to send custom events
    
Execute Queries

    $nrql = "SELECT uniquecount(session) FROM PageView";
    $nrql .= "WHERE appName='PHP Application' SINCE 1 hour ago COMPARE WITH 1 hour ago";
    $result = Insight::query($nrql);

Send Custom Events

    $events = array();
    $events[] = array('eventType'=> 'Event Name', 'atrribute1'=> 'attribute value 1', 'attribute2'=> 'atrribute value 2');
    Insight::insertCustomEvents($events);
    

    
        
    

