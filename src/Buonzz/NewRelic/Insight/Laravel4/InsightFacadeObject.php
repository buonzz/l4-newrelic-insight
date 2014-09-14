<?php namespace Buonzz\NewRelic\Insight\Laravel4;

use Buonzz\NewRelic\Insight\Insight;

class InsightFacadeObject{ 
	private $insight;	

	public function __construct(){
		return $this->insight = new Insight;				
	}

	public function setQueryKey($api_key){
		return $this->insight->setQueryKey($api_key);
	}

	public function setInsertKey($api_key){
		return $this->insight->setInsertKey($api_key);
	}

	public function setAccountID($account_id){
		return $this->insight->setAccountID($account_id);		
	}

	public function query($NRQL){
		return $this->insight->query($NRQL);
	}

	public function insertCustomEvents($events){
		return $this->insight->insertCustomEvents($events);
	}
}