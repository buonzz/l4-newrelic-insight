<?php namespace Buonzz\NewRelic\Insight;

/**
*  The Interface for all subscribers.
*
*  @author Darwin Biler <buonzz@gmail.com>
*/
interface EventSubscriberInterface{
	public function subscribe($events);	
}