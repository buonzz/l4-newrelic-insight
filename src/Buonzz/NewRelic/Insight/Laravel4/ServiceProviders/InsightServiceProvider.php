<?php namespace Buonzz\NewRelic\Insight\Laravel4\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Buonzz\NewRelic\Insight\Laravel4\InsightFacadeObject;

/**
*  The Laravel4 Service provider to bind the class to the IoC container
*
*  This makes it possible for Laravel to find the classes in the App object
*  like App::make('Insight');
*  
*/
class InsightServiceProvider extends ServiceProvider{
	/**
	* Bind the class to IoC container
	*  @return Insight;
	*/
	public function register(){
		$this->app->bind('insight', function(){
			return new InsightFacadeObject;
		});

		$this->app['config']->package('buonzz/l4-newrelic-insight', __DIR__.'/../../../../../config');
	}

	public function boot()
	{
		$this->package('buonzz/l4-newrelic-insight');
	}
}