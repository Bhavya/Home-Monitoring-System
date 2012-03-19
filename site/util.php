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

	   	if($house_id == "") {
	   		$house_id = substr(md5($telno), 0, 8);
	   	}

	   	$sql = "INSERT INTO user_data (firstname, lastname, username, password, house_id, telno) 
	   	VALUES ('$firstname', '$lastname', '$username', '$password', '$house_id', '$telno');";
	   	$link = mysql_query($sql);
	   	if (!$link) {
		    die('<h2>Whoops!</h2> Something went wrong. ' . mysql_error());
		} else {
			echo '<h2>Congrats!</h2> You have been successfully registered. You may now log in to HOMOS';
			registerLoggedEvent($house_id, date("F j, Y, g:i a"), "You registered with HOMOS Home Monitoring System.");
		}
	}

	function validateUser() {
		unsetEverything();

		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$result = mysql_query("SELECT * FROM user_data WHERE username='$username'") or die(mysql_error());  
		$row = mysql_fetch_array( $result );
		if($password == $row['password']){
			set_session('firstname', $row['firstname']);
			set_session('house_id', $row['house_id']);
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
		<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyDs0Ya39g1PSVcDw4haT-R1Y638SCYbbR4"></script>
	    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
	    <link type="text/css" href="css/style.css" rel="stylesheet" />
	    <link type="text/css" href="css/ui-lightness/Aristo.css" rel="stylesheet" />
	    <script type="text/javascript" src="js/jquery.min.js"></script>
	  	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	  	<script type="text/javascript" src="js/jquery.tools.min.js"></script>
	  	<script type="text/javascript" src="js/jquery.gmap.min.js"></script>
	<?php
	}

	function registerLoggedEvent($house_id, $timestamp, $event) {
		$sql = "INSERT INTO update_spam (house_id, timestamp, event) 
	   	VALUES ('$house_id', '$timestamp', '$event');";
	   	$link = mysql_query($sql);
	   	if (!$link) {
		    die('Whoops! Something went wrong. ' . mysql_error());
		}
	}

	function renderLoggedEvent($timestamp, $event) { ?>
		<table class="event">
			<tr>
				<td class="timestamp">
					<?php echo $timestamp;?>
				</td>
				<td>
					<?php echo $event;?> <span style="float:right">x</span>
				</td>
			</tr>
		</table>
	<?php
	}

	function renderAllLoggedEvents($house_id){
		$result = mysql_query("SELECT * FROM update_spam WHERE house_id='$house_id'") or die(mysql_error());  
		while($row = mysql_fetch_array($result)){
			renderLoggedEvent($row['timestamp'], $row['event']);
		}
	}

	function unsetEverything(){
		unset($_SESSION['loggedin']);
		unset($_SESSION['firstname']);
		unset($_SESSION['lastname']);
		unset($_SESSION['house_id']);
		unset($_SESSION['password']);
		unset($_SESSION['telno']);
		unset($_SESSION['loggedin']);
	}
?>