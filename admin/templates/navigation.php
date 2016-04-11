<nav class="navbar navbar-inverse">
	<ul class="nav navbar-nav">
		<?php //navigation($dbc,$pageid);?>
			
		<li><a href="#">Admin Dashboard</a></li>
		<li><a href="#">Pages</a></li>
		<li><a href="#">Users</a></li>
		<li><a href="#">Settings</a></li>
	</ul>
	
	<ul class="nav navbar-nav navbar-right">
		<li>
			<?php if ($debug == 1) { ?>
					<button id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
			<?php } ?>
		</li>
		<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user['fullname'];?><span class="caret"></span></a>
	          <ul class="dropdown-menu">
				<li><a href="logout.php">Logout</a></li>
	          </ul>
    	</li>
	</ul>
</nav>