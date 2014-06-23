<?php 

/**
*  Corresponding Class to test Insight class
*
*
*  @author buonzz
*/
class InsightTest extends PHPUnit_Framework_TestCase{
	
  /**
  * Just check if the Insight has no syntax error. 
  *
  * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
  * any typo before you even use this library in a real project.
  *
  */
  public function testIsThereAnySyntaxError(){
  	$var = new Buonzz\NewRelic\Insight\Insight;    
  	$this->assertTrue(is_object($var));
  	unset($var);
  } 


  /**
  *  Check if the query method is executing properly.
  *
  * This tests if the query method is working, basically, set first the AccountID and QueryKey
  * This will surely fail if you dont. Adjust as well the appName value to reflect your actual appName
  *
  */
  public function testIsAbleToExecuteQuery(){
    $var = new Buonzz\NewRelic\Insight\Insight;    

    $var->setAccountID(getenv('NEWRELIC_ACCOUNT_ID'));
    $var->setQueryKey(getenv('NEWRELIC_QUERY_KEY'));

    $resp = $var->query("SELECT uniquecount(session) FROM PageView WHERE appName='PHP Application' SINCE 1 hour ago COMPARE WITH 1 hour ago");
    $this->assertTrue(is_object($resp));
    
    unset($var);    
  }


  /**
  *  Check if the insertCustomEvents method is executing properly.
  *
  * This tests if the query method is working, basically, set first the AccountID and InsertKey
  * This will surely fail if you dont. Adjust as well the appName value to reflect your actual appName
  *
  */
  public function testIsAbleToInsertCustomEvents(){
    $var = new Buonzz\NewRelic\Insight\Insight;    

    $var->setAccountID(getenv('NEWRELIC_ACCOUNT_ID'));
    $var->setInsertKey(getenv('NEWRELIC_INSERT_KEY'));

    $events = array();
    $events[] = array('eventType'=> 'Unit Test Executed', 'method'=> 'testIsAbleToInsertCustomEvents', 'class'=> 'InsightTest');
    $events[] = array('eventType'=> 'Unit Test Ended', 'method'=> 'testIsAbleToInsertCustomEvents', 'class'=> 'InsightTest');

    $resp = $var->insertCustomEvents($events);
    $this->assertTrue(is_object($resp));
    
    unset($var);    
  }
  
}