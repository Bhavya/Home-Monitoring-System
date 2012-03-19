<?php
	include 'util.php';
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
		}
	}
?>