<?php namespace Buonzz\NewRelic\Insight\Aggregates;

use Buonzz\NewRelic\Insight\Insight;

class BaseAggregate implements EventInterface{	
	protected $insight;

	public function __construct(){

		$this->insight = new Insight;

		$this->insight->setQueryKey(\Config::get('l4-newrelic-insight::query_key'));
		$this->insight->setInsertKey(\Config::get('l4-newrelic-insight::insert_key'));
		$this->insight->setAccountID(\Config::get('l4-newrelic-insight::account_id'));		

		return $this;
	}
}