<?php
session_start();

if (empty($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

if (empty($_SESSION['house_id'])) {
    die('You have no house.');
}

require_once '../shared/util.php';
db_connect();

require 'tpl/main.tpl';
?>
