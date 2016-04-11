<?php

function data_page($dbc,$id) {
	$q = "SELECT * FROM pages WHERE id = $id";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	return $data;
}

function data_all_page($dbc) {
	$q = "SELECT * FROM pages";
	$r = mysqli_query($dbc, $q);
	//$data = mysqli_fetch_assoc($r);
	return $r;
}

function data_settings($dbc,$id) {
	$q = "SELECT * FROM settings WHERE id = '$id'";
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	return $data['value'];
}

function data_user($dbc,$id) {
	
	if (is_numeric($id)) {
		$q = "SELECT * FROM users WHERE id = '$id'";
	}
	else {
		$q = "SELECT * FROM users WHERE email = '$id'";	
	}
	$r = mysqli_query($dbc, $q);
	$data = mysqli_fetch_assoc($r);
	$data['fullname'] = $data['fname'].' '.$data['lname'];
	$data['fullname_reverse'] = $data['lname'].', '.$data['fname'];
	return $data;
}
?>