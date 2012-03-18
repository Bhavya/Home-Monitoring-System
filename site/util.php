<?php

	function db_connect(){
		$link = mysql_connect('localhost', 'karmabub_homos', 'homos');
		if (!$link) {
		    die('Could not connect: ' . mysql_error());
		} else {
			set_session('connected', true);
			mysql_select_db("karmabub_homos") or die(mysql_error());
		}
	}

	function set_session($name, $val){
		if(!ISSET($_SESSION[$name])){
			$_SESSION[$name] = $val;
		}
	}

	function get_session($name){
		if(ISSET($_SESSION[$name])){
			return $_SESSION[$name];
		} else {
			return false;
		}
	}

	function registerUser() {
	   	$firstname = $_POST['firstname'];
	   	$house_id = $_POST['house_id'];
	   	$lastname = $_POST['lastname'];
	   	$password = md5($_POST['password']);
	   	$telno = $_POST['telno'];
	   	$username = $_POST['email'];

	   	$sql = "INSERT INTO user_data (firstname, lastname, username, password, house_id, telno) 
	   	VALUES ('$firstname', '$lastname', '$username', '$password', '$house_id', '$telno');";
	   	$link = mysql_query($sql);
	   	if (!$link) {
		    die('<h2>Whoops!</h2> Something went wrong. ' . mysql_error());
		} else {
			echo '<h2>Congrats!</h2> You have been successfully registered. You may now log in to HOMOS';
		}
	}
?>