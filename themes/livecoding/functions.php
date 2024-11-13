<?php 

define('LC_THEME_DIR_URI', get_template_directory_uri());
define('LC_THEME_DIR', get_template_directory());

// Include composer autoloader
require_once LC_THEME_DIR . '/vendor/autoload.php';

// singleton class 
class Livecoding_Theme {

  private static $instance = null;

  private function __construct(){
    include LC_THEME_DIR . '/includes/categories.php';
    include LC_THEME_DIR . '/includes/posts.php';
    add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
  }

  public function enqueue_styles() {
    wp_enqueue_style('livecoding-theme', get_stylesheet_uri());
  }

  public static function get_instance() {
    if( null == self::$instance ){
      self::$instance = new self;
    }

    return self::$instance;
  }
}


Livecoding_Theme::get_instance();


 

/**
 * Proper way to enqueue scripts and styles.
 */

/*
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'livecoding-theme', get_stylesheet_uri() );
    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
*/
 
/*
function codeytek_enqueue_scripts(){
  wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css'), 'all');
  // wp_register_script( 'main-js', get_template_directory_uri(  ) . '/assets/main.js', [], filemtime( get_template_directory() . '/assets/main.js'), true );
  
  wp_enqueue_style('style-css');
  // wp_enqueue_script('main-js');
 
}

add_action( 'wp_enqueue_scripts', 'codeytek_enqueue_scripts');

*/