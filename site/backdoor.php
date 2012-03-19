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
		switch ($type) {
		    case "feed":
		        $house_id = $_GET['id'];
		        renderAllLoggedEvents($house_id);
		        break;
		    case "bar":
		        echo "i is bar";
		        break;
		    case "cake":
		        echo "i is cake";
		        break;
		}
	}
?>