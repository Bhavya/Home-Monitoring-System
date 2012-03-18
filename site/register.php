<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
  include 'util.php';
  db_connect();
?>
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
        $('#regerror').hide();
        $('#register').click(function(){
              var warning = false;
              if(!$('#fname').val()){
                $('#fname').addClass('warning');
                warning = true;
              }
              if(!$('#lname').val()){
                $('#lname').addClass('warning');
                warning = true;
              }
              if(!$('#email').val()){
                $('#email').addClass('warning');
                warning = true;
              }
              if(!$('#password').val()){
                $('#password').addClass('warning');
                warning = true;
              }
              if(!$('#telno').val()){
                $('#telnom').addClass('warning');
                warning = true;
              }

              if(warning){
                $('#regerror').show('slow');
                return false;
              }
            }
          );
  	  });
  	 </script>
  </head>
  <body>
    <div class="header">
      <div class="content">
        <img src="img/logo.png" class="logo">
      </div>
    </div>
    <div class="middle">
      <div class="content loginarea">
        <div class="registerbox">
          <?php
            if(!ISSET($_GET['register'])){
          ?>
          <h2>Register</h2>
          <div id="regerror" class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
            <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .7em;"></span> 
            Please fill in the highlighted fields. </p>
          </div>
          <form action="<?php echo $_SERVER['PHP_SELF']."?register=true" ?>" method="post">
            <div class="reginputs">
              <input name="firstname" id="fname" type="Text" class="cred" placeholder="First Name">
              <input name="email" id="email"type="Text" class="cred" placeholder="Email">
              <input name="password" id="password" type="Password" class="cred" placeholder="Password">
            </div>
            <div class="reginputs">
              <input name="lastname" id="lname"type="Text" class="cred" placeholder="Last Name">
              <input name="house_id" id="house_id" type="Text" class="cred" placeholder="HomeID (leave blank if first time)">
              <input name="telno" id="telno" type="Text" class="cred" placeholder="Telephone Number">

            </div>
            <button id="register" type="submit" style="width:100%;margin-top:10px;margin-bottom:20px"> Register Now! </button>
          </form>
          <?php
            } else {
              registerUser();
            }
          ?>
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