<?php
  include 'user_auth.php';
  if(ISSET($_GET['logout'])){
  	unsetEverything();
  	header('Location: index.php');
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
  	<?php renderHead();?>
    <script type="text/javascript">
  		$(document).ready(function() {		
        $('button').button();
        $( "#radio" ).buttonset();
        //$('[placeholder]').defaultValue();
        $('#map').gMap({ markers: [{ latitude: 43.469787,
                              longitude: -80.540827,
                              html: "Tettnang, Germany",
                              popup: false }],
                  zoom: 16 });
  	  });
  	 </script>
  </head>
  <body>
    <div class="header">
      <div class="content">
        <img src="img/logo.png" class="logo">
        <div class="topmenu">
        	<?php echo $firstname." ".$lastname;?> | 
        	<a href="<?php echo $_SERVER['PHP_SELF']."?logout=true"?>">
        		Logout
        	</a>
        </div>
      </div>
    </div>
    <div class="content">
    	<div class="sidemenu">
    		Home Security <hr/>
    		<table class="menu">
    			<tr>
    				<td> <img src="img/door.png"> <br/> Doors and Windows</td>
    				<td> <img src="img/motion.png"> <br/> Motion </td>
    				<td> <img src="img/floodlight.png"> <br/> Floodlights</td>
    			</tr>
    		</table >
    		Family Monitoring <hr/>
    		 <table class="menu">
    			<tr>
    				<td></td>
    				<td><img src="img/camera.png"> <br/> Cameras</td>
    				<td></td>
    			</tr>
    		</table>
    		Green Energy <hr/>
    		<table class="menu">
    			<tr>
    				<td><img src="img/lights.png"> <br/> Lights</td>
    				<td><img src="img/temperature.png"> <br/>Temperature</td>
    				<td><img src="img/power.png"> <br/>Power</td>
    			</tr>
    		</table>
    	</div>
    	<div class="welcome">
    		Welcome, <?php echo $firstname;?>!
    		<div class="general_info">
	    		<div id="map"></div>
	    		<div class="info">
	    			Address
		    		<div id="radio">
						<input type="radio" id="radio1" name="radio" checked="checked" /><label for="radio1">Enabled</label>
						<input type="radio" id="radio2" name="radio" /><label for="radio2">Disabled</label>
					</div>
				</div>
			</div>
    	</div>
    	<div class="updates">
    		<?php 
    			//registerLoggedEvent($house_id, date("F j, Y, g:i a"), 'Kitchen Lights Off');
    			renderAllLoggedEvents($house_id);
    		?> 
    	</div>
    </div>
    <div class="absolutebottom">
      Copyright HOMOS Corporation | Site Design by Bhavya Kashyap
    </div>
  </body>
</html>