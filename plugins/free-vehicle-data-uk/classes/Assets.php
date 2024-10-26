<?php
namespace FreeVehicleData;

if ( ! defined( 'ABSPATH' ) )
	exit;

class Assets{

    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'IncludeAssets'], 9999);
        add_action('admin_enqueue_scripts', [$this, 'IncludeAdminAssets'], 9999);
    }

    public function IncludeAdminAssets(){
        wp_register_style('fvd-toastr-styles', FreeVehicleData()->sURL.'assets/css/toastr.css', false, FreeVehicleData()->sVersion, 'all');
        wp_enqueue_style ('fvd-toastr-styles');
        wp_register_script('fvd-toastr-js', FreeVehicleData()->sURL . 'assets/js/toastr.js', false, FreeVehicleData()->sVersion, 'all');
        wp_enqueue_script ('fvd-toastr-js');
        wp_register_style('fvd-admin-css', FreeVehicleData()->sURL.'assets/css/admin.css', false, FreeVehicleData()->sVersion, 'all');
        wp_enqueue_style ('fvd-admin-css');
        wp_register_script('fvd-admin-js', FreeVehicleData()->sURL . 'assets/js/admin.js', false, FreeVehicleData()->sVersion, 'all');
        wp_enqueue_script ('fvd-admin-js');
    }
    public function IncludeAssets(){
        wp_register_style('fvd-css', FreeVehicleData()->sURL.'assets/css/style.css', false, FreeVehicleData()->sVersion, 'all'); 
        wp_enqueue_style ('fvd-css');
    }
}
