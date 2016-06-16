<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title><?php echo $this->Lang->write('app_browser_title_login_page');?></title>

  <!-- Favicons-->
  <link rel="icon" href="<?php print $this->TemplatePath; ?>images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php print $this->TemplatePath; ?>images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php print $this->TemplatePath; ?>images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="<?php print $this->TemplatePath; ?>min/css/app.min.css" type="text/css" rel="stylesheet" media="screen,projection">

	<script type="text/javascript" src="<?php print $this->TemplatePath; ?>min/js/top.js"></script>  
  
</head>

<body class="indigo">
	<div class="login-page" class="row">
		<div class="col s12 z-depth-4 card-panel">

	    <?php $this->renderErrors();?>
		<?php $this->renderSuccess();?>
	          	
		<?php print $this->renderModuleCall('account', 'snip', 'login');?>

		</div>
	</div>

	<script type="text/javascript" src="<?php print $this->TemplatePath; ?>min/js/bottom.js"></script>
    <script type="text/javascript" src="<?php print $this->TemplatePath; ?>min/js/modules.js"></script>  
</body>

</html>