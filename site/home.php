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
          var loadUrl = "backdoor.php?type=feed&id=<?php echo $house_id;?>";  
          $(".updates").html(ajax_load);
          setInterval(function(){
            $(".updates").ready(function(){  
              $(".updates").load(loadUrl);  
            });
          }, 3000);       

          $( "#dialog:ui-dialog" ).dialog( "destroy" );
  
          $( "#dialog-modal-confirm" ).dialog({
            autoOpen: false,
            height: 180,
            modal: true,
            buttons: { 
              "Yes I do" : function(){},
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
                  var loadUrl = "backdoor.php?type=address&id=<?php echo $house_id;?>&number=" +$("#number").val() + "&city=" + $("#city").val() + "&province=" + $("#province").val()  + "&postal=" + $("#postal").val();
                  $("#hidden").load(loadUrl);
                  $( this ).dialog( "close" );
                }
              }
            });
          <?php } ?>
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
	    			<?php renderAboutInfo($house_id);?>
				</div>
			</div>
    	</div>
    	<div class="updates">
    		<?php 
    			//registerLoggedEvent($house_id, date("F j, Y, g:i a"), 'Kitchen Lights Off');
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
        <input id="number" type="Text" class="cred" placeholder="Number and Street Name">
        <input id="city" type="Text" class="cred" placeholder="City">
        <input id="province" type="Text" class="cred" placeholder="Province">
        <input id="postal" type="Text" class="cred" placeholder="Postal Code">       
      </div>
      <div id="hidden"></div>
    <?php } ?>
  </body>
</html>