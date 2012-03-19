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

$result = mysql_query("SELECT * FROM update_spam WHERE house_id='" . $_SESSION['house_id'] . "'") or die(mysql_error());  
$events = array();
while($row = mysql_fetch_array($result)){
    $events[] = array('timestamp' => row['timestamp'], 'event' => $row['event']);
}
require 'tpl/main.tpl':
?>
