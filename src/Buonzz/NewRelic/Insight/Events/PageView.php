<?php namespace Buonzz\NewRelic\Insight\Events;

use Illuminate\Support\Collection;

class PageView extends BaseEvent{
	public $appID;
	public $appName;
	public $backendDuration;
	public $city;
	public $countryCode;
	public $duration;
	public $pageURL;
	public $regionCode;
	public $session;
	public $userAgentName;
	public $userAgentOS;
	public $userAgentVersion;

	public function __construct(){
		parent::__construct();		
	}

	public function find($appID){		
		
		$nrql = "SELECT * from PageView Where appId = '{$appID}'";
		$data = $this->insight->query($nrql);		

		$col = new Collection();

		foreach($data->results[0]->events as $item)
		{
			$val = $this->map_to_me($item);
			$col->push($val);
		}

		return $col;
	}

	private function map_to_me($obj){
		$pv = new PageView;

		foreach($obj as $k=>$v)	
			$pv->{$k} = $v;
		return $pv;
	}

}