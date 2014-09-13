<?php namespace Buonzz\NewRelic\Insight\Events;

use Buonzz\NewRelic\Insight\Insight;

class BaseEvent implements EventInterface{
	protected $table_name = '';
	protected $fields = array();
	protected $insight;

	public function __construct(){
		$this->insight = new Insight;
	}

	public function setQueryKey($key){
		$this->insight->setQueryKey($key);
	}

	public function setInsertKey($key){
		$this->insight->setInsertKey($key);
	}

	public function setAccountID($account_id){
		$this->insight->setAccountID($account_id);		
	}
}