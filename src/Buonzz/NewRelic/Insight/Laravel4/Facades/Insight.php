<?php namespace Buonzz\NewRelic\Insight\Laravel4\Facades;

use Illuminate\Support\Facades\Facade;

/**
*  Facade class for Insight.
*
*  a facade for Laravel Application
*
*  @author Darwin Biler <buonzz@gmail.com>
*/
class Insight extends Facade{
   /**
   *  method to be called to return the "real" class, since facade is just a front
   *  note that the insight is lowercase, since that is what we had registered in the ServiceProvider
   */
   protected static function getFacadeAccessor(){ return 'insight';};
}