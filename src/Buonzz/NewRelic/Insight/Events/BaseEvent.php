<?php namespace Buonzz\NewRelic\Insight\Events;

use Buonzz\NewRelic\Insight\Insight;

class BaseEvent implements EventInterface{	
	protected $insight;

	public function __construct(){
		$this->insight = new Insight;
		return $this;
	}

	public function setQueryKey($key){
		$this->insight->setQueryKey($key);
		return $this;
	}

	public function setInsertKey($key){
		$this->insight->setInsertKey($key);
		return $this;
	}

	public function setAccountID($account_id){
		$this->insight->setAccountID($account_id);		
		return $this;
	}
}