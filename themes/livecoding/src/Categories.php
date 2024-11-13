<?php 

namespace Imon\LC_THEME;

class Categories 
{

  public static function current_category(){
  	$queried_object = get_queried_object();
  	var_dump($queried_object);
  }
 
}
