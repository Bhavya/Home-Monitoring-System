<?php
 	include '../shared/util.php';
 	if(!get_session('loggedin') || !get_session('password')){
 		header('Location: index.php');
 	}
 	$firstname = get_session('firstname');
 	$lastname = get_session('lastname');
 	$username = get_session('username');
 	$telno = get_session('telno');
 	$house_id = get_session('house_id');
?>
