<?php
// Include file functions.php
require_once('functions.php');

// Panggil fungsi logout
$gpsTracker = new GpsTrackingSystem();
$gpsTracker->logoutUser();

// Redirect atau tampilkan pesan logout berhasil
header("Location: index.php"); // Ganti dengan halaman yang sesuai
exit();
