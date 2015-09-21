<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title ?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<!-- jQuery 1.11.3 -->
		<?php echo Asset::js('jQuery-1.11.3.min.js'); ?>
		<!-- Bootstrap 3.3.5 -->
		<?php echo Asset::css('bootstrap.min.css'); ?>
		<!-- FontAwesome 4.4.0 -->
		<?php echo Asset::css('font-awesome.min.css'); ?>
		<!-- Ionicons 2.0.1 -->
		<?php echo Asset::css('ionicons-2.0.1/css/ionicons.min.css'); ?>
		<!-- Theme style -->
		<?php echo Asset::css('AdminLTE.min.css'); ?>
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<?php echo Asset::css('_all-skins.min.css'); ?>
		<!-- iCheck -->
		<?php echo Asset::css('blue.css'); ?>
		<!-- Morris chart -->
		<?php echo Asset::css('morris.css'); ?>
		<!-- jvectormap -->
		<?php echo Asset::css('jquery-jvectormap-1.2.2.css'); ?>
		<!-- Date Picker -->
		<?php echo Asset::css('datepicker3.css'); ?>
		<!-- Daterange picker -->
		<?php echo Asset::css('daterangepicker-bs3.css'); ?>
		<!-- bootstrap wysihtml5 - text editor -->
		<?php echo Asset::css('bootstrap3-wysihtml5.min.css'); ?>
		<!-- Bootstrap Select -->
		<?php echo Asset::css('bootstrap-select.min.css'); ?>

		<!--  -->
		<?php echo Asset::css('narumi.css'); ?>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>

		</script>
	</head>
	<body class="skin-blue sidebar-mini">
		<div class="wrapper">

			<header class="main-header">
				<?php echo $header; ?>
			</header>

			<aside class="main-sidebar">
				<?php echo $sidebar; ?>
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<?php echo $content; ?>
			</div>

			<footer class="main-footer">
				<?php echo $footer; ?>
			</footer>

			<!-- jQuery UI 1.11.4 -->
			<?php echo Asset::js('jquery-ui.min.js'); ?>
			<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
			<script type="text/javascript">
				$.widget.bridge('uibutton', $.ui.button);
			</script>
			<!-- Bootstrap 3.3.2 JS -->
			<?php echo Asset::js('bootstrap.min.js'); ?>
			<!-- Morris.js charts -->
			<?php echo Asset::js('raphael-min.js'); ?>
			<!-- Sparkline -->
			<?php echo Asset::js('jquery.sparkline.min.js'); ?>
			<!-- jvectormap -->
			<?php echo Asset::js('jquery-jvectormap-1.2.2.min.js'); ?>
			<?php echo Asset::js('jquery-jvectormap-world-mill-en.js'); ?>
			<!-- jQuery Knob Chart -->
			<?php echo Asset::js('jquery.knob.js'); ?>
			<!-- daterangepicker -->
			<?php echo Asset::js('moment.min.js'); ?>
			<?php echo Asset::js('daterangepicker.js'); ?>
			<!-- datepicker -->
			<?php echo Asset::js('bootstrap-datepicker.js'); ?>
			<!-- Bootstrap WYSIHTML5 -->
			<?php echo Asset::js('bootstrap3-wysihtml5.all.min.js'); ?>
			<!-- Slimscroll -->
			<?php echo Asset::js('jquery.slimscroll.min.js'); ?>
			<!-- FastClick -->
			<?php echo Asset::js('fastclick.min.js'); ?>
			<!-- AdminLTE App -->
			<?php echo Asset::js('app.min.js'); ?>
			<!-- Bootstrap Select -->
			<?php echo Asset::js('bootstrap-select.min.js'); ?>
		</div>
	</body>
</html>
