<h1 class="fvduk-title">Free Vehicle Data UK</h1><small><i>by RapidCarCheck.co.uk</i></small>
<div style="height:32px" aria-hidden="true" class="admin-spacer"></div>
<p class="backend-font-heavy-big"><img src="<?php echo(FVD_URL);?>/assets/images/gold-star.png">Monthly API Usage</p>
<p class="backend-api-stats">Usage statistics for: <strong> <?php echo(get_option( 'siteurl' ));?> </strong></p>
<p class="backend-api-stats">API package: <strong> (<?php echo($aAPIState["MonthlyPackage"]);?>) </strong></p>
<p class="backend-api-stats">Checks remaining: <strong> (<?php echo($aAPIState["DailyLimit"]);?>) </strong></p>
<div style="height:32px" aria-hidden="true" class="admin-spacer"></div>
<h2>Vehicle Searches</h2>
<?php if (file_exists($sLogFilePath)):$sLogs = file_get_contents($sLogFilePath); ?>
<textarea id="searchlog" class="backendsearchfvd" class="box" rows="10"><?php echo($sLogs);?></textarea>	
<div style="height:32px" aria-hidden="true" class="admin-spacer"></div>
<?php else:?>
Search log will appear here once first search is made!
<div style="height:32px" aria-hidden="true" class="admin-spacer"></div>	
<?php endif;?>
