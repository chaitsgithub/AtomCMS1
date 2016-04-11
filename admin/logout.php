<?php
	unset($_SESSION['username']);
	// session_destroy() --> To delete all the session keys
	header('Location: login.php');
?>