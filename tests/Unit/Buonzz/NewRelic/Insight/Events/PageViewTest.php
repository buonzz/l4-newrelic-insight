<?php 

/**
*  Corresponding Class to test Insight class
*
*
*  @author buonzz
*/
class PageViewTest extends PHPUnit_Framework_TestCase{
	
  public function testIsThereAnySyntaxError(){
  	$var = new Buonzz\NewRelic\Insight\Events\PageView;    
  	$this->assertTrue(is_object($var));
  	unset($var);
  } 

  public function testFind(){
    $pv = new Buonzz\NewRelic\Insight\Events\PageView;    

    $account_id = getenv('NEWRELIC_ACCOUNT_ID');
    $query_key = getenv('NEWRELIC_QUERY_KEY');

    if(!$account_id)
      throw new Exception('NEWRELIC_ACCOUNT_ID environment variable should be set in able to run test');

    if(!$query_key)
      throw new Exception('NEWRELIC_QUERY_KEY environment variable should be set in able to run test');

    $pv->setAccountID($account_id);
    $pv->setQueryKey($query_key);

    $pageviews = $pv->find(11089834);   
   
    $first = $pageviews->first();
    $this->assertTrue(strlen($first->appName)>0);

    unset($pv);    
  }
  
}