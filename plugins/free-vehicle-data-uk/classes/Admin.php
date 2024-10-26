<?php
namespace FreeVehicleData;

if ( ! defined( 'ABSPATH' ) )
	exit;

class Admin{

    public function __construct() {
        add_action('admin_menu',[$this,'RegisterOptionsPage']);
        add_action('admin_init',[$this,'RegisterSettings']);
    }

    function RegisterSettings(){
        register_setting( 'FVDUKDisableEndPoint', 'FVDUKDisableEndPoint' );
        register_setting( 'FVDUKCreditUs', 'FVDUKCreditUs' );	
    }
    
    public function RegisterOptionsPage(){
      add_menu_page( 'Free Vehicle Data UK', 'FVD UK', 'manage_options', 'free-vehicle-data-uk', [$this,'AdminPage'], 'dashicons-car');

    }
    function AdminPage(){
        $sLogFilePath = plugin_dir_path(FVD_FILE) . 'assets/log.txt';
        $aAPIState = json_decode(wp_remote_retrieve_body(wp_remote_get( 'https://www.rapidcarcheck.co.uk/FreeAccess/Requests.php?auth=LeCc0xMsd00fnsMF345o3&site=' . '&site=' . get_option( 'siteurl' ))), true);
        include(plugin_dir_path(FVD_FILE).'templates/admin/page.php');
    }
    
}





