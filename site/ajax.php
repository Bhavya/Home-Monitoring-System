<?php
	include '../shared/util.php';
	if(ISSET($_GET['query'])) {
	 	$query = s_dec($_GET['query']);

		$result = mysql_query($query);
	 	while($row = mysql_fetch_array($result)){
			print_r($row);
		}
	}

	if(ISSET($_GET['type'])){
		$type = $_GET['type'];
		$house_id = $_GET['id'];
		switch ($type) {
		    case "feed":
		        renderAllLoggedEvents($house_id);
		        break;
		    case "address":
		        $number = $_GET['number'];
		        $city = $_GET['city'];
		        $province = $_GET['province'];
		        $postal = $_GET['postal'];

		        $address = "$number,\n$city,\n$province $postal";
		        registerAddress($house_id, $address);
		        break;
		    case "onoff":
		        $state = $_GET['state'];
		        enableSystem($house_id, $state);
		        break;
		    case "test":
		    	registerLoggedEvent($house_id, date("F j, Y, g:i a"), 'Garage Door Unlocked');
		    	break;
		}
	}

	if(ISSET($_GET['sensor'])) {
		$sensor = $_GET['sensor'];
		$house_id = $_GET['id'];
 		switch($sensor) {
          case "door":
            renderDoorData($house_id);
            break;
          case "motion":
          	renderMotionData($house_id);
            break;
          case "floodlight":
          	renderFloodlightData($house_id);
            break;
          case "camera":
          	renderCameraData($house_id);
            break;
          case "lights":
          	renderLightsData($house_id);
            break;
          case "temperature":
          	renderTemperatureData($house_id);
            break;
          case "power":
          	renderPowerData($house_id);
            break;
        }
    }

    if(ISSET($_GET['update'])) {
		$sensor = $_GET['update'];
		$house_id = $_GET['id'];
 		switch($sensor) {
          case "door":
            renderDoorData($house_id);
            $place = $_GET['place'];
            registerLoggedEvent($house_id, date("F j, Y, g:i a"), "$place Door unlocked.");
            break;
          case "motion":
            registerLoggedEvent($house_id, date("F j, Y, g:i a"), "Motion detected outside house. Security alerted.");
            break;
          case "floodlight":
          	registerLoggedEvent($house_id, date("F j, Y, g:i a"), 'Floodlight engaged.');
            break;
          case "camera":
          	$place = $_GET['place'];
            registerLoggedEvent($house_id, date("F j, Y, g:i a"), "$place Camera enabled.");
            break;
          case "lights":
          	$place = $_GET['place'];
          	$state = "off";
          	if($_GET['state']==1) $state ="on";
          	registerLoggedEvent($house_id, date("F j, Y, g:i a"), "$place Light $state.");
          	$device_id = fetchDeviceId($house_id, $place, "lights");
          	insertLightsData($house_id, $_GET['state'], $device_id);
            break;
          case "temperature":
          	renderTemperatureData($house_id);
            break;
          case "power":
          	renderPowerData($house_id);
            break;
        }
    }
?>
