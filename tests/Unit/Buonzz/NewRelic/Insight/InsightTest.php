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

    $var->setAccountID('XXXXX');
    $var->setQueryKey('xxxxxxx');

    $resp = $var->query("SELECT uniquecount(session) FROM PageView WHERE appName='yoursite.com' SINCE 1 hour ago COMPARE WITH 1 hour ago");
    $this->assertTrue(is_object($resp));
    unset($var);    
  }
  
}