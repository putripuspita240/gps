<?php
require_once('functions.php');

$gpsTracker = new GpsTrackingSystem();
$data = $gpsTracker->getMotorData();
echo json_encode(array('data' => $data));
