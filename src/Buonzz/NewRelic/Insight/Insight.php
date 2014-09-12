<?php namespace Buonzz\NewRelic\Insight;
/**
*  A class to send and retrieve data from NewRelic Insight.
*
*  Use this to send and retrieve data from NewRelic API
*  This is a base class on which you can make Laravel 
*  store the events data to newrelic dashboards
*
*  @author Darwin Biler <buonzz@gmail.com>
*/
class Insight{ 
	private $query_key;
	private $insert_key;
	private $account_id;

	public function setQueryKey($api_key){
		$this->query_key = $api_key;
	}

	public function setInsertKey($api_key){
		$this->insert_key = $api_key;
	}

	public function setAccountID($account_id){
		$this->account_id = $account_id;		
	}

	public function query($NRQL){

		$url = "https://insights-api.newrelic.com/v1/accounts/". $this->account_id ."/query?nrql=" . urlencode($NRQL);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_USERAGENT, 'Buonzz Laravel Insight Library v1.0');		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Accept: application/json',
	    'X-Query-Key: ' . $this->query_key
	    ));

		$data = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($data, 0, $header_len);
		$body = substr($data, $header_len);

		curl_close($ch);

		return json_decode($body);
	}

	public function insertCustomEvents($events){

		$url = "http://insights-collector.newrelic.com/v1/accounts/". $this->account_id ."/events";
		$data_string = json_encode($events);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_USERAGENT, 'Buonzz Laravel Insight Library v1.0');		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/json',
	    'X-Insert-Key: ' . $this->insert_key,
	    'Content-Length: ' . strlen($data_string)
	    ));

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 

		$data = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($data, 0, $header_len);
		$body = substr($data, $header_len);

		curl_close($ch);

		return json_decode($body);
	}
}