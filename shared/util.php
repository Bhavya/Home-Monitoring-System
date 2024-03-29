<?php
	include '../shared/lights.php';
	include '../shared/house.php';
	include '../shared/floodlights.php';
	include '../shared/temperature.php';
	include '../shared/doors.php';

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
		$_SESSION[$name] = $val;
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
			$sql = "INSERT INTO household_data (house_id, address, phone, state) VALUES ('$house_id', '', '$telno', '');";
		   	$link = mysql_query($sql);	   
			registerLoggedEvent($house_id, date("F j, Y, g:i a"), "You registered with HOMOS Home Monitoring System.");
			set_session('new', true);
		}
	}

	function registerAddress($house_id, $address){
		$sql = "UPDATE household_data SET address='$address' WHERE house_id='$house_id';";
		$link = mysql_query($sql);	   
	}

	function enableSystem($house_id, $state){
		$sql = "UPDATE household_data SET state='$state' WHERE house_id='$house_id';";
		$link = mysql_query($sql);	  
		if (!$link) {
		    die('<h2>Whoops!</h2> Something went wrong. ' . mysql_error());
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

	function renderLoggedEvent($timestamp, $event) { 
		$class = null;
		if(strlen(strstr($event,'Security'))>0) { $class="warning"; }
		?>
		<table class="event">
			<tr class="<?php echo $class;?>">
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
			$results[] = $row;
		}
		$results = array_reverse($results);
		$num = 0;
		foreach ($results as $result) {
			renderLoggedEvent($result[1], $result[2]);
			$num++;
			if($num == 10) break;
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

	function renderAboutInfo($house_id){
		$result = mysql_query("SELECT * FROM household_data WHERE house_id='$house_id'") or die(mysql_error());  
		while($row = mysql_fetch_array($result)){
			echo '<b>Household ID:</b> <br/>'.$row['house_id'];
			echo '<br/><br/><b>Address:</b> <br/>'.str_replace(",", ",<br />", $row['address']);
			echo '<br/><br/><b>Phone:</b> <br/>'.$row['phone']."<br/><br/>";?>
				<div id="radio">
					<input type="radio" id="radio1" name="radio" <?php if($row['state']==1) echo 'checked';?> /><label for="radio1">Enabled</label>
					<input type="radio" id="radio2" name="radio" <?php if($row['state']!=1) echo 'checked';?> /><label for="radio2">Disabled</label>
				</div>
		<?php
		}
	}

	function s_enc($s)
	{
		for( $i = 0; $i < strlen($s); $i++ ){
			$r[] = ord($s[$i]);
		}
		return implode('.', $r);
	}

	function s_dec($s)
	{
		$s = explode(".", $s);
		for( $i = 0; $i < count($s); $i++ ){
			$s[$i] = chr($s[$i]);
		}
		return implode('', $s);
	}

	function renderDoorData($house_id){
		echo "<h2>Doors and Windows</h2>";
		$door = new DoorsRecord();
		$allDoors = $door->load($house_id);
		foreach ($allDoors as $singleDoor) {
			formatSensorData($singleDoor->getTimeStamp(), fetchRoomByDeviceID($singleDoor->getDevice())." Door", "2");
		}

	}

	function renderMotionData($house_id){
		echo "<h2>Outdoor Motion Detector</h2>";
		$floodlights = new FloodlightsRecord();
		$allLights = $floodlights->load($house_id);
		foreach ($allLights as $singleLight) {
			formatSensorData($singleLight->getTimeStamp(), "Motion Detected", $singleLight->getState());
		}
	}
	function renderFloodlightData($house_id){
		echo "<h2>Floodlights</h2>";
		$floodlights = new FloodlightsRecord();
		$allLights = $floodlights->load($house_id);
		foreach ($allLights as $singleLight) {
			formatSensorData($singleLight->getTimeStamp(), "Outdoor Floodlight", $singleLight->getState());
		}

	}
	function renderCameraData($house_id){
		echo "<h2>Cameras</h2> Sorry, you have not subscribed to this service.";
	} 
	function renderLightsData($house_id){
		echo "<h2>Lights</h2>";
		$lights = new LightsRecord();
		$allLights = $lights->load($house_id);
		foreach ($allLights as $singleLight) {
			formatSensorData($singleLight->getTimeStamp(), $singleLight->getDevice(), $singleLight->getState());
		}
	}

	function formatSensorData($timestamp, $room, $state) {?>
		<table class="event">
			<tr>
				<td class="timestamp">
					<?php echo $timestamp;?>
				</td>
				<td class="room">
					<?php echo $room;?> 
				<td>
					<?php if($state==1){echo "On";}elseif($state==2){echo "Unlocked";}else{echo "Off";}?> <span style="float:right">x</span>
				</td>
				</td>
			</tr>
		</table>
	<?php }

	function insertLightsData($house_id, $state, $device_id){
		$lights = new LightsRecord();
		$lights->setState($state, $device_id, $house_id, date("F j, Y, g:i a"));
	}

	function insertFloodlightData($house_id, $state, $device_id){
		$lights = new FloodlightsRecord();
		$lights->setState("1", $device_id, $house_id, date("F j, Y, g:i a"));
	}

	function insertDoorData($house_id, $device_id){
		$door = new DoorsRecord();
		$door->setState($device_id, $house_id, date("F j, Y, g:i a"));
	}

	function renderTemperatureData($house_id){
		echo "<h2>Temperature</h2> Sorry, you have not subscribed to this service.";
	}
	function renderPowerData($house_id){
		echo "<h2>Power</h2> Sorry, you have not subscribed to this service.";
	}

	function fetchDeviceId($house_id, $place, $type) {
		$result = mysql_query("SELECT * FROM device_info WHERE house_id='$house_id' AND room='$place'") or die(mysql_error());  
		$row = mysql_fetch_array( $result );
		$device_id = $row['device_id'];
		if(mysql_num_rows($result) < 1) {
			$device_id = rand(2000,10000);
			mysql_query("INSERT INTO device_info (device_id, device_type, house_id, room) VALUES ('$device_id', '$type', '$house_id', '$place')") or die(mysql_error());
		}
		return $device_id;
	}

	function fetchRoomByDeviceID($device_id) {
		$result = mysql_query("SELECT * FROM device_info WHERE device_id='$device_id'") or die(mysql_error());  
		$row = mysql_fetch_array( $result );
		return $row['room'];
	}

    function getCurrentTimestamp() {
        return date("F j, Y, g:i a");
    }
?>
