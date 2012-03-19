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
require_once '../shared/lights.php';
db_connect();

$lights = LightsRecord::load($_SESSION['house_id']);

require 'tpl/lights.tpl';
?>
