<?php
  include '../shared/util.php';
  $loginheader = "Login";
  $loginmsg = "";
  if(ISSET($_GET['login'])){
    if(validateUser()){
      header('Location: home.php');
    } else {
      $loginheader = "Oops!";
      $loginmsg = "That combination of credentials does not exist.<br/> Please try again, reset your password, or sign up.";
    }
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title> HOMOS - The Comprehensive Home Monitoring System </title>
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link type="text/css" href="css/style.css" rel="stylesheet" />
    <link type="text/css" href="css/ui-lightness/Aristo.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
  	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
  	<script type="text/javascript" src="js/jquery.tools.min.js"></script>
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
        <a href="http://homos.karmabubble.com"><img src="img/logo.png" class="logo"></a>
      </div>
    </div>
    <div class="middle">
      <div class="content loginarea">
        <div class="loginbox">
          <h2><?php echo $loginheader;?></h2>
          <?php echo $loginmsg;?>
          <form action="<?php echo $_SERVER['PHP_SELF']."?login=true" ?>" method="post">
            <input name="username" type="Text" class="cred" placeholder="Username">
            <input name="password" type="Password" class="cred" placeholder="Password">
            <button type="submit" style="width:100%;margin-top:10px;margin-bottom:20px"> Login </button>
          </form>
          <br/>
          <a href=>Forgot your password?</a> | <a href="register.php">Register with us</a>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="content">
        <div class="bottom about">
          <h1>About</h1>
          Personal and family security has always been a top priority for people. To have the peace of mind that a loved one is safe is priceless. Unfortunately, many companies specializing in security focus on excessive means to try to create the illusion of a bullet proof security system, at prices which most families simply cannot afford.
          <div style="width:100%;text-align:right"><a href="">More &rarr;</a></div>
        </div>
        <div class="bottom">
          <h1>Services</h1>
          <ul>
            <li>Home Security</li>
            <li>Family Monitoring</li>
            <li>Green Energy Management</li>
          </ul>
        </div>
        <div class="bottom faq">
          <h1>FAQ</h1>
          <a href="">Where can I sign up?</a><br>
          <a href="">How is my insurance affected?</a><br>
          <a href="">How much does this cost?</a><br>
          <a href="">Where do I purchase equipment?</a><br>
          <a href="">Where do I purchase warranty?</a><br>
          <a href="">What if I change residence?</a><br>
          <div style="width:100%;text-align:right"><a href="">More &rarr;</a></div>
        </div>
        <div class="bottom">
          <h1>Links</h1>
          <a href="">Terms</a><br>
          <a href="">Services</a><br>
          <a href="">Privacy</a><br>
          <a href="">Equipment</a><br>
          <a href="">Documentation</a><br>
          <a href="">Contact</a><br>
        </div>
      </div>
    </div>
    <div class="absolutebottom">
      Copyright HOMOS Corporation | Site Design by Bhavya Kashyap
    </div>
  </body>
</html>
