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
require_once '../shared/devices.php';
db_connect();

if (isset($_POST['lightsOn'])) {
    LightsRecord::setState(true, $_POST['room'], $_SESSION['house_id']);
}
if (isset($_POST['lightsOff'])) {
    LightsRecord::setState(false, $_POST['room'], $_SESSION['house_id']);
}

$devices = Device::load($_SESSION['house_id'], Device::LIGHT_DEVICE);

$lights = LightsRecord::load($_SESSION['house_id']);

require 'tpl/lights.tpl';
?>
