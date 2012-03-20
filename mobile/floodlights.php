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
require_once '../shared/floodlights.php';
require_once '../shared/devices.php';
db_connect();

if (isset($_POST['lightsOn'])) {
    FloodlightsRecord::setState(true, $_POST['room'], $_SESSION['house_id']);
}
if (isset($_POST['lightsOff'])) {
    FloodlightsRecord::setState(false, $_POST['room'], $_SESSION['house_id']);
}

$devices = Device::load($_SESSION['house_id'], Device::FLOODLIGHT_DEVICE);

$floodlights = FloodlightsRecord::load($_SESSION['house_id']);

require 'tpl/floodlights.tpl';
?>
