<?php

	function db_connect(){
		$link = mysql_connect('localhost', 'karmabub_homos', 'homos', 'karmabub_homos');
		if (!$link) {
		    die('Could not connect: ' . mysql_error());
		} else {
			set_session('connected', true);
		}
	}

	function set_session($name, $val){
		if(!ISSET($SESSION[$name])){
			$SESSION[$name] = $val;
		}
	}

	function get_session($name){
		if(ISSET($SESSION[$name])){
			return $SESSION[$name];
		} else {
			return false;
		}
	}

	function registerUser() {
	   $username = $_POST['username'];
	   $password = md5($_POST['password']);

	   $sql = "INSERT INTO user_data (username, password) VALUES ($username, $password);";

	   mysql_query($sql);
	}
?>