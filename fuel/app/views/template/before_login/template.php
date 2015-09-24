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
		<!--  -->
		<?php echo Asset::css('before-login.css'); ?>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>

		</script>
	</head>
	<body>
	<?php echo $content; ?>
	</body>
</html>
