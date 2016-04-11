<?php

include ('config/connection.php');

#Functions:
include ('functions/data.php');
include ('functions/template.php');

#Constants:
define('D_TEMPLATE', 'templates');

if (isset($_GET['page'])) {
	$pageid = $_GET['page'];
}
else {
	$pageid = 'home';
}

#Page Setup
$pages = data_page($dbc, $pageid);
$debug = data_settings($dbc, 'debug-console');
$pages['new'] = $pages['body'];
?>