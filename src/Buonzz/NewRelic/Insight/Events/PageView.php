<?php namespace Buonzz\NewRelic\Insight\Events;

use Illuminate\Support\Collection;

class PageView extends BaseEvent{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'PageView';
		$this->fields= array('appID', 'appName', 'backendDuration', 'city', 
			'countryCode', 'duration', 'pageURL', 'regionCode', 'session', 'userAgentName',
			'userAgentOS', 'userAgentVersion');		
	}

	public function find($appID){		
		$nrql = "SELECT * from PageView Where appId = '{$appID}'";
		$data = $this->insight->query($nrql);		
		$col = new Collection($data->results[0]->events);
		return $col;
	}

}