<?php 




class Categories 
{
  private static $instance = null;

  private function __construct() 
  {
    add_action('init', [$this, 'test']);
  }

  public function test()
  {
    // echo 'this is a test';
  }

  public static function get_instance() 
  {
    if (null == self::$instance){
      self::$instance = new self;
    }

    return self::$instance;
  }
}

Categories::get_instance();