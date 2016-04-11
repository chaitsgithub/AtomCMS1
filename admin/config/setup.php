<?php

error_reporting(0);

#Database Connection:
include ('../config/connection.php');

#Functions:
include ('functions/data.php');
include ('functions/template.php');
include ('functions/sandbox.php');

#Constants:
define('D_TEMPLATE', 'templates');

if (isset($_GET['page'])) {
	$pageid = $_GET['page'];
}
else {
	$pageid = 1;
}

#Page Setup:
include ('config/queries.php');
if (isset($_GET['id'])) {
	$opened = data_page($dbc, $_GET['id']);
}

$debug 	= data_settings($dbc, 'debug-console');
$user 	= data_user($dbc,$_SESSION['username']);

?>