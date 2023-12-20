<?php
require_once('functions.php');

$gpsTracker = new GpsTrackingSystem();
$data = $gpsTracker->getLokasiData();
echo json_encode(array('data' => $data));
