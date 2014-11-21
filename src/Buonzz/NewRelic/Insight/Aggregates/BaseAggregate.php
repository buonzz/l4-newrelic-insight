<?php namespace Buonzz\NewRelic\Insight\Aggregates;

use Buonzz\NewRelic\Insight\Insight;
use Illuminate\Support\Collection;

class BaseAggregate{	
	
	protected $insight;
	protected $eventName;

	public function __construct(){

		$this->insight = new Insight;

		$this->insight->setQueryKey(\Config::get('l4-newrelic-insight::query_key'));
		$this->insight->setInsertKey(\Config::get('l4-newrelic-insight::insert_key'));
		$this->insight->setAccountID(\Config::get('l4-newrelic-insight::account_id'));		
		$this->eventName = get_class();		

		return $this;
	}

	public function all(){

		$nrql = "SELECT * FROM " . $this->eventName . " SINCE ";
		$data = $this->insight->query($nrql);

		$col = new Collection($data->results[0]->events);
		return $col;
	}

}