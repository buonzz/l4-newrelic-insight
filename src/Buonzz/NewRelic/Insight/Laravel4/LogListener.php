<?php namespace Buonzz\NewRelic\Insight\Laravel4;

use Buonzz\NewRelic\Insight\Insight;

class LogListener{		
	protected $insight;

	public function __construct(){
		$this->insight = new Insight;
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

	public function listen($appID, $level, $message, $context){		

		$events = array();
		$events[] = array('eventType'=> 'LaravelAppLogs', 
						  'siteID' => $appID, 
						  'level' => $level,
						  'message' => $message,
						  'context' => $context);

		$this->insight->insertCustomEvents($events);
		return $this;		
	}
}