<input id="FVD_AjaxURL" type="hidden" value="<?php echo(admin_url('admin-ajax.php'));?>">
<?php
    if($aAPIState['APIAccess']=='no'){
        $aDomainData = parse_url(get_option( 'siteurl' ));
        include('not-member.php');
    }else{
        include('member.php');
        include('actions.php');
    }