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

          $( "#dialog:ui-dialog" ).dialog( "destroy" );
  
          $( "#dialog-modal-confirm" ).dialog({
            autoOpen: false,
            height: 180,
            modal: true,
            buttons: { 
              "Yes" : function(){ 
                $( this ).dialog( "close" );
              },
              Cancel: function() {
                $( this ).dialog( "close" );
              }
            }
          });

          <?php 
            if(get_session('new')){?>
            $( "#dialog-modal-new" ).dialog({
              height: 345,
              width: 327,
              modal: true,
              buttons: { 
                Ok : function(){
                  var loadUrl = "ajax.php?type=address&id=<?php echo $house_id;?>&number=" +$("#number").val() + "&city=" + $("#city").val() + "&province=" + $("#province").val()  + "&postal=" + $("#postal").val();
                  $("#hidden").load(loadUrl);
                  $( this ).dialog( "close" );
                }
              }
            });
          <?php } ?>

          $("#radio1").click(function() {
              var loadUrl = "ajax.php?type=onoff&state=1&id=<?php echo $house_id;?>";
              $("#dialog-modal-confirm" ).dialog("open");
              $("#hidden").load(loadUrl);
              $(".updates").show();
              showUpdates(true);
          });
          $("#radio2").click(function() {
              var loadUrl = "ajax.php?type=onoff&state=0&id=<?php echo $house_id;?>";
              $("#dialog-modal-confirm").dialog("open");
              $("#hidden").load(loadUrl);
              showUpdates(false);
          });

          if($("#radio1").attr("checked")) {
            showUpdates(true);
          } else {
            var msg = "<CENTER>Please enable your system to see updates.</CENTER>"
            $(".updates").html(msg);
          }

          function showUpdates(sysEnabled) {
            if(sysEnabled) {
              var loadUrl = "ajax.php?type=feed&id=<?php echo $house_id;?>";  
              $(".updates").html(ajax_load);
              setInterval(function(){
                $(".updates").ready(function(){  
                  $(".updates").load(loadUrl);
                });
              }, 3000); 
            } else {
              $(".updates").hide();
            }
          }
  	  });
  	 </script>
  </head>
  <body>
    <div class="header">
      <div class="content">
        <a href="http://homos.karmabubble.com/home.php"><img src="img/logo.png" class="logo"></a>
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
    	<div class="welcome">
    		Welcome, <?php echo $firstname;?>!
    		<div class="general_info">
	    		<div id="map"></div>
	    		<div class="info">
	    			<?php renderAboutInfo($house_id);?>
				</div>
			</div>
    	</div>
      <div id="hidden"></div>
    	<div class="updates">
    		<?php 
    			//registerLoggedEvent($house_id, date("F j, Y, g:i a"), 'Garage Door Unlocked');
    		?> 
    	</div>
    </div>

    <div id="dialog-modal-confirm" title="Confirm Setting Change">
      <p>Are you sure you would like to change this setting?</p>
    </div>

     <?php 
      if(get_session('new')){?>
      <div id="dialog-modal-new" title="Welcome!">
        <p>Welcome to HOMOS, <?php echo $firstname;?>! Please update your address to proceed.</p>
        <input id="number" type="Text" class="cred" placeholder="Number and Street Name (No Spaces)">
        <input id="city" type="Text" class="cred" placeholder="City">
        <input id="province" type="Text" class="cred" placeholder="Province">
        <input id="postal" type="Text" class="cred" placeholder="Postal Code">       
      </div>
    <?php } ?>
  </body>
</html>
