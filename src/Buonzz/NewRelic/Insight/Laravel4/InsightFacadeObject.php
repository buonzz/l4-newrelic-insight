<?php namespace Buonzz\NewRelic\Insigh\Laravel4;

class InsightFacadeObject{ 
	private $insight;	

	public function setQueryKey($api_key){
		$this->insight->query_key = $api_key;
	}

	public function setInsertKey($api_key){
		$this->insight->insert_key = $api_key;
	}

	public function setAccountID($account_id){
		$this->insight->account_id = $account_id;		
	}

	public function query($NRQL){
		return $this->insight->query($NRQL);
	}

	public function insertCustomEvents($events){
		$this->insight->insertCustomEvents($events);
	}
}