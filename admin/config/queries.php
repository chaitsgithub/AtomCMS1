<?php
	if ($_POST) {
		if ($_POST['submitted'] == 1) {
			$label 	= mysqli_escape_string($dbc,$_POST['label']);
			$slug 	= mysqli_escape_string($dbc,$_POST['slug']);
			$title 	= mysqli_escape_string($dbc,$_POST['title']);
			$header = mysqli_escape_string($dbc,$_POST['header']);
			$body 	= mysqli_escape_string($dbc,$_POST['body']);
			
			if ($_POST['id'] != '') {
				$q = "UPDATE pages SET user_id = '$_POST[user]', label = '$label', slug = '$slug', title = '$title', header = '$header', body = '$body' WHERE id = '$_POST[id]'";
				$action = 'updated';
			} else {
				$q = "INSERT INTO pages VALUES (NULL,$_POST[user],'$slug','$label','$title','$header','$body')";
				$action = 'added';							
			}
			
			$r = mysqli_query($dbc, $q);
			if ($r) {
				echo '<p>Page was '.$action.'!</p>';
			}
			else {
				echo '<p>Page could not be '.$action.' because : '.mysqli_error($dbc);
				echo '<p>'.$q.'</p>';
			}
		}
	}
?>