<?php 

class Posts {

	private static $instance = null;

	private function __construct() {
		add_filter('the_title', [$this, 'change_title']);
	}

	public function change_title($post_title){
		return strtoupper($post_title);

	}

	public static function get_instance() {
		if( null == self::$instance){
			self::$instance = new self;
		}
		return self::$instance;
	}
}

Posts::get_instance();