<?php
#Start Session:
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
	
include ('config/setup.php');
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Admin Dashboard</title>
		<!-- Viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<?php include ('config/css.php') ?>
		<?php include ('config/js.php') ?>
	</head>
	
	<body>
		<div id="wrap">
			<?php include (D_TEMPLATE.'/navigation.php'); ?>
			<h1>Admin Dashboard</h1>
			
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a class="list-group-item" href="index.php">
							<i class="fa fa-plus"></i> New Page
						</a>		
						  	
						<?php			
							$pages 	= data_all_page($dbc);			
							while ($page_list = mysqli_fetch_assoc($pages)) { 
								$blurb = substr(strip_tags($page_list['body']),0,160);?>
								
								<a class="list-group-item <?php selected($page_list['id'], $opened['id'], 'active')?>" href="index.php?id=<?php echo $page_list['id']?>">
									<h4 class="list-group-item-heading"><?php echo $page_list['title']?></h4>
									<p class="list-group-item-text"><?php echo $blurb;?></p>
								</a>
								
						<?php	} ?>
					</div>
				</div>
				
				<div class="col-md-9">
					
					<form method="post" action="index.php?id=<?php echo $opened['id']?>" role="form">
						
						<div class="form-group">
					    	<label for="title">Title:</label>
					    	<input type="title" class="form-control" id="title" name="title" placeholder="Page Title" value=<?php echo $opened['title']?>>
						</div>
						
						<div class="form-group">
					    	<label for="user">Users:</label>
					    	<select class="form-control" name="user" id="user">
					    		<option value="0">No user</option>
					    		<?php
					    			$x = ''; $y = '';
					    			$q = "SELECT id FROM users ORDER BY fname ASC;";
									$r = mysqli_query($dbc, $q);
									while ($user1 = mysqli_fetch_assoc($r)) {
										$user_data = data_user($dbc,$user1['id']); ?>
										
									<option value="<?php echo $user_data['id']?>"
										<?php if (isset($_GET['id'])) {selected($user_data['id'], $opened['user_id'], 'selected');} else {selected($user_data['id'], $user['id'], 'selected');}?>>
										<?php echo $user_data['fullname_reverse']?>
									</option>
								<?php	} ?>
					    	</select>
						</div>

						<div class="form-group">
					    	<label for="slug">Slug:</label>
					    	<input type="slug" class="form-control" id="slug" name="slug" placeholder="Page Slug" value=<?php echo $opened['slug']?>>
						</div>
						
						<div class="form-group">
					    	<label for="label">Label:</label>
					    	<input type="label" class="form-control" id="label" name="label" placeholder="Page Label" value=<?php echo $opened['label']?>>
						</div>

						<div class="form-group">
					    	<label for="header">Header:</label>
					    	<input type="header" class="form-control" id="header" name="header" placeholder="Page Header" value=<?php echo $opened['header']?>>
						</div>

						<div class="form-group">
					    	<label for="body">Body:</label>
					    	<textarea class="form-control" id="body" name="body" placeholder="Page Body" rows="8" value=<?php echo $opened['body']?>></textarea>
						</div>
																  
						<button type="submit" class="btn btn-default">Save</button>
						<input type="hidden" name="submitted" value="1"/>
						<input type="hidden" name="id" value=<?php echo $opened['id']?>/>
					</form>
				</div>
			</div>
		</div>
		<!--
		<?php include (D_TEMPLATE.'/footer.php'); ?>
		-->
		<?php include (D_TEMPLATE.'/debug_widget.php'); ?>
		
	</body>
</html>