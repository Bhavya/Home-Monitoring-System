<?php
require 'util.php';
$loginheader = "Login";
$loginmsg = "";
if(ISSET($_GET['login'])){
    if(validateUser()){
      header('Location: home.php');
    } else {
      $loginmsg = "That combination of credentials does not exist.<br/> Please try again, reset your password, or sign up.";
    }
}

$title = 'Login';

require 'tpl/index.tpl';
?>
