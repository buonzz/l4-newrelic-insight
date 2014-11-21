<?php 

class LogListenerTest extends PHPUnit_Framework_TestCase{
	
  public function testIsThereAnySyntaxError(){
  	$var = new Buonzz\NewRelic\Insight\Laravel4\LogListener;    
  	$this->assertTrue(is_object($var));
  	unset($var);
  }  
  
}