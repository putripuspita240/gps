<?php
require_once('functions.php');

$gpsTracker = new GpsTrackingSystem();
$data = $gpsTracker->getPenggunaData();
echo json_encode(array('data' => $data));
