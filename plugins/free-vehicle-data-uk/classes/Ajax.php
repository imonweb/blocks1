<?php
namespace FreeVehicleData;

if ( ! defined( 'ABSPATH' ) )
	exit;

class Ajax{
    public function __construct() {
        add_action('wp_ajax_nopriv_FVD_CreatePages', [$this, 'CreatePages'], 9999);
        add_action('wp_ajax_FVD_CreatePages', [$this, 'CreatePages'], 9999);
        
        add_action('wp_ajax_nopriv_FVD_ClearSearchLogs', [$this, 'ClearSearchLogs'], 9999);
        add_action('wp_ajax_FVD_ClearSearchLogs', [$this, 'ClearSearchLogs'], 9999);
        
        add_action('wp_ajax_nopriv_FVD_ClearImages', [$this, 'ClearImages'], 9999);
        add_action('wp_ajax_FVD_ClearImages', [$this, 'ClearImages'], 9999);
    }
    public function ClearSearchLogs(){
        $aAnswer = ['messages'=>['Vehicle search log was deleted!'],'html'=>''];
        file_put_contents(plugin_dir_path(FVD_FILE) . 'assets/log.txt', '');
        $aJSONAnswer = json_encode($aAnswer);
        header('Content-type: application/json');
        echo($aJSONAnswer);
        die();    
    }
    public function ClearImages(){
        $aAnswer = ['messages'=>['Local image cache files have been deleted!'],'html'=>''];
        $imagefiles = glob(plugin_dir_path(FVD_FILE) . 'assets/vehicleimages/*');
            foreach ($imagefiles as $imagefile){
                if (is_file($imagefile)) {
                    unlink($imagefile);
                }
            }
        $aJSONAnswer = json_encode($aAnswer);
        header('Content-type: application/json');
        echo($aJSONAnswer);
        die();     
    }
    public function CreatePages(){
        $aAnswer = ['messages'=>['Your demo pages have been imported'],'html'=>''];
        $aTemplates = [
            ['id'=>0,'url'=>'','title'=>'Two Column FVD Demo','file'=>'2-col-layout.php'],
            ['id'=>0,'url'=>'','title'=>'One Column FVD Demo','file'=>'1-col-layout.php'],
            ['id'=>0,'url'=>'','title'=>'Two Column ALT FVD Demo','file'=>'2-col-layout-alt.php'],
            ['id'=>0,'url'=>'','title'=>'Two Column ALT FVD Demo ALT IMG','file'=>'2-col-layout-alt-img.php'],
            ];
        foreach($aTemplates as $iIndex=>$aTemplate){
            $sFile = plugin_dir_path(FVD_FILE) . 'templates/'.$aTemplate['file'];	
            $hFile = fopen($sFile, "r");
            $sPage = fread($hFile,filesize($sFile));
            fclose($hFile );

            $aArgs = 
                [
                'post_title'	=> $aTemplate['title'],
                'post_content'	=> $sPage,
                'post_status'	=> 'publish',
                'post_type'	=> 'page'
                ];

            $iPageID = wp_insert_post($aArgs);
            $aTemplates[$iIndex]['id'] = $iPageID;
            $aTemplates[$iIndex]['url'] = strpos(get_permalink($aTemplates[$iIndex]['id']), '?')!==false?get_permalink($aTemplates[$iIndex]['id']).'&Reg=FY60KGG':get_permalink($aTemplates[$iIndex]['id']).'?Reg=FY60KGG';
            ob_start();
            include(plugin_dir_path(FVD_FILE).'templates/admin/pages-created.php');
            $sHTML = ob_get_contents();
            ob_end_clean();
            $aAnswer['html'] = $sHTML;
        }
        $aJSONAnswer = json_encode($aAnswer);
        header('Content-type: application/json');
        echo($aJSONAnswer);
        die();
        
    }
}
