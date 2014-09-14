<?php namespace Buonzz\NewRelic\Insight\Laravel4\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Buonzz\NewRelic\Insight\Insight as Insight;

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
		$this->app['insight'] = $this->app->share(function($app)
		{
		  return new Insight;
		});

	  	$this->app->booting(function()
		{
		  $loader = \Illuminate\Foundation\AliasLoader::getInstance();
		  $loader->alias('Insight', 'Buonzz\NewRelic\Insight\Insight');
		});
	}

	public function boot()
	{
		$this->package('buonzz/insight');
	}
}