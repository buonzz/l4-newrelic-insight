<?php namespace Buonzz\NewRelic\Insight\Events;

class PageView extends BaseEvent{
	
	public function __construct(){
		$this->table_name = 'PageView';
		$this->fields= array('appID', 'appName', 'backendDuration', 'city', 
			'countryCode', 'duration', 'pageURL', 'regionCode', 'session', 'userAgentName',
			'userAgentOS', 'userAgentVersion');		
	}

	public static function find($appID){
		$nrql = "SELECT * from PageView Where appId = '{$appID}'";
		$data = $this->insight->query($nrql);
		return $data;
	}

}