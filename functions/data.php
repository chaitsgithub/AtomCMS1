<?php

function data_page($dbc,$id) {
	
	if (is_numeric($id)) {
		$q = "SELECT * FROM pages WHERE id = $id";	
	}
	else {
		$q = "SELECT * FROM pages WHERE slug = '$id'";
	}
	
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	return $data;
}

function data_settings($dbc,$id) {
	$q = "SELECT * FROM settings WHERE id = '$id'";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	return $data['value'];
}
?>