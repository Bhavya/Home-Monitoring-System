<?php

	function db_connect() {
		$link = mysql_connect('localhost', 'karmabub_homos', 'homos');
		if (!$link) {
		    die('Could not connect: ' . mysql_error());
		} else {
			set_session('connected', true);
			mysql_select_db("karmabub_homos") or die(mysql_error());
		}
	}

	function set_session($name, $val) {
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

	function validateUser() {
		unset($_SESSION['loggedin']);

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$result = mysql_query("SELECT * FROM user_data WHERE username='$username'") or die(mysql_error());  
		$row = mysql_fetch_array( $result );
		if($password == $row['password']){
			set_session('firstname', $row['firstname']);
			set_session('lastname', $row['lastname']);
			set_session('loggedin', true);
			set_session('password', $row['password']);
			set_session('telno', $row['telno']);
			set_session('username', $username);
			return true;
		}
		return false;
	}

  	db_connect();
	session_start();

	function renderHead(){ ?>
		<title> HOMOS - The Comprehensive Home Monitoring System </title>
	    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
	    <link type="text/css" href="css/style.css" rel="stylesheet" />
	    <link type="text/css" href="css/ui-lightness/Aristo.css" rel="stylesheet" />
	    <script type="text/javascript" src="js/jquery.min.js"></script>
	  	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	  	<script type="text/javascript" src="js/jquery.tools.min.js"></script>
	<?php
	}
?>