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
		<header class="main-header">
			<!-- Logo -->
			<?php echo Html::anchor('/',
				'<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>LTE</span>',
				array('class' => 'logo'));
			?>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<?php echo Html::anchor('#',
					'<span class="sr-only">Toggle navigation</span>',
					array('class' => 'sidebar-toggle',
							'data-toggle' => 'offcanvas',
							'role' => 'button'));
				?>
			</nav>
		</header>
