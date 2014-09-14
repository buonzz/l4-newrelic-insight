<?php 

class LogListenerTest extends PHPUnit_Framework_TestCase{
	
  public function testIsThereAnySyntaxError(){
  	$var = new Buonzz\NewRelic\Insight\Laravel4\LogListener;    
  	$this->assertTrue(is_object($var));
  	unset($var);
  } 

  public function testListen(){
    $ll = new Buonzz\NewRelic\Insight\Laravel4\LogListener;    

    $account_id = getenv('NEWRELIC_ACCOUNT_ID');
    $insert_key = getenv('NEWRELIC_INSERT_KEY');

    if(!$account_id)
      throw new Exception('NEWRELIC_ACCOUNT_ID environment variable should be set in able to run test');

    if(!$insert_key)
      throw new Exception('NEWRELIC_INSERT_KEY environment variable should be set in able to run test');

    $ll->setAccountID($account_id)->setInsertKey($insert_key);
    
    $ll->listen('phpunit', 'debug', 'Running PHPUnit to Test', 'LogListenerTest->testListen');
    
    unset($ll);    
  }
  
}