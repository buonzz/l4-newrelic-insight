<?php 


use Buonzz\NewRelic\Insight\Aggregates\PageView;

class PageViewTest extends PHPUnit_Framework_TestCase{

  public function testIsThereAnySyntaxError(){
  	$pv = new PageView;      	
  	$data = $pv->all();
    var_dump($data);
  } 
  
}