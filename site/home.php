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
        //$('[placeholder]').defaultValue();
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
    	<div class="welcome">
    		Welcome, <?php echo $firstname;?>!
    	</div>
    	<div class="updates">
    		<?php 
    			registerLoggedEvent($house_id, date("F j, Y, g:i a"), 'Bedroom Lights Off');
    			renderAllLoggedEvents($house_id);
    		?> 
    	</div>
    </div>
    <div class="absolutebottom">
      Copyright HOMOS Corporation | Site Design by Bhavya Kashyap
    </div>
  </body>
</html>