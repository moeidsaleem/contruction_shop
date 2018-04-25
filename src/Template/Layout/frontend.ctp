<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php echo $language ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php echo $language ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php echo $language ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?php echo $language ?>">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
<?php echo $this->Html->charset(); ?>
<?php
  	echo $this->element('includes/meta_tags');
?>
<?php
	echo $this->Html->meta('icon');
	//echo $this->Html->css('all');
	echo $this->fetch('meta');
	echo $this->fetch('css');
?>
<?php  
  	echo $this->element('includes/google_analytics');
?>
<?php 
    $jsVars = array(
        'webroot' => $this->request->webroot,
		'webroot_full' => $webroot_full,
        'language' => $language,
        'client_device' => $agentInfo['client_device'],
        'client_device_name'=>$agentInfo['client_device_name'],
        'client_browser' => $agentInfo['client_browser'],
        'client_os' => $agentInfo['client_os'],
		'environment'=> $environment,
    );
    echo $this->Html->scriptBlock('var window_app = ' . json_encode($jsVars) . ';'); 
	echo $this->element('includes/all_js_css');
	echo $this->fetch('script');
?>
</head>
<body class="<?php echo $agentInfo['client_device'] ?> <?php echo $agentInfo['client_os'] ?> <?php echo $agentInfo['client_device_name'] ?> <?php echo $agentInfo['client_browser'] ?>  <?php echo 'language_'.$language ?>">
	<?php echo $this->fetch('content'); ?>	
</body>
</html>