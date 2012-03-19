<?php
  include 'user_auth.php';
  if(ISSET($_GET['logout'])){
    set_session('new', false);
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

          $.ajaxSetup ({  
            cache: false  
          }); 
          var ajax_load = "<CENTER>Please wait while your feed is being generated.<br /><img src='img/load.gif' alt='loading...' /></CENTER>";
          <?php
            $query = "SELECT * FROM update_spam WHERE house_id='$house_id'";
            $query = s_enc($query);
          ?>


        <?php 
          if(ISSET($_GET['sensor'])){
            $sensor = $_GET['sensor'];
            $params = "sensor=$sensor&id=$house_id";
          }
        ?> 

          var loadUrl = "ajax.php?<?php echo $params;?>";  
          $(".updates").html(ajax_load);
          setInterval(function(){
            $(".updates").ready(function(){  
              $(".updates").load(loadUrl);  
            });
          }, 3000);       
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
    				<td> <a href="device_info.php?sensor=door"><img src="img/door.png"> <br/> Doors and Windows</a></td>
    				<td> <a href="device_info.php?sensor=motion"><img src="img/motion.png"> <br/> Motion </a></td>
    				<td> <a href="device_info.php?sensor=floodlight"><img src="img/floodlight.png"> <br/> Floodlights </a></td>
    			</tr>
    		</table >
    		Family Monitoring <hr/>
    		 <table class="menu">
    			<tr>
    				<td></td>
    				<td><a href="device_info.php?sensor=camera"><img src="img/camera.png"> <br/> Cameras </a></td>
    				<td></td>
    			</tr>
    		</table>
    		Green Energy <hr/>
    		<table class="menu">
    			<tr>
    				<td><a href="device_info.php?sensor=lights"><img src="img/lights.png"> <br/> Lights </a></td>
    				<td><a href="device_info.php?sensor=temperature"><img src="img/temperature.png"> <br/>Temperature </a></td>
    				<td><a href="device_info.php?sensor=power"><img src="img/power.png"> <br/>Power </a></td>
    			</tr>
    		</table>
    	</div>
    	<div class="updates">
    	</div>
    </div>

  </body>
</html>
