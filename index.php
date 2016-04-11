<?php include ('config/setup.php');?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $pages['title']?></title>
		<!-- Viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php include ('config/css.php') ?>
		<?php include ('config/js.php') ?>
	</head>
	
	<body>
		<div id="wrap">
			<?php include (D_TEMPLATE.'/navigation.php'); ?>
			
			<div class="container">
				<h1><?php echo $pages['header']?></h1>
				<p><?php echo $pages['body']; ?></p>
			</div>
		</div>
		
		<?php include (D_TEMPLATE.'/footer.php'); ?>
		<?php include (D_TEMPLATE.'/debug_widget.php'); ?>
		
	</body>
</html>