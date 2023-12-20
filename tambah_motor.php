<?php
// Pastikan Anda memiliki koneksi ke database dan telah memuat file functions.php di sini.
require_once('functions.php');

// Buat instance dari kelas GpsTrackingSystem
$gpsTracker = new GpsTrackingSystem();

// Periksa jika request datang dari metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah data yang diperlukan telah diterima dari form
    if (isset($_POST['nama_pengguna']) && isset($_POST['plat_motor']) && isset($_POST['merek']) && isset($_POST['tahun'])) {

        // Ambil data dari form
        $nama_pengguna = $_POST['nama_pengguna'];
        $plat_motor = $_POST['plat_motor'];
        $merek = $_POST['merek'];
        $tahun = $_POST['tahun'];

        // Panggil fungsi tambahDataMotor() dari instance $gpsTracker
        $result = $gpsTracker->tambahDataMotor($nama_pengguna, $plat_motor, $merek, $tahun);

        // Mengirim hasil eksekusi ke client-side sebagai respon JSON
        echo json_encode($result);
    } else {
        // Jika data yang diperlukan tidak lengkap, kirim respon JSON ke client-side
        echo json_encode(array("status" => "error", "message" => "Data yang diperlukan tidak lengkap"));
    }
} else {
    // Jika request bukan dari metode POST, kirim respon JSON ke client-side
    echo json_encode(array("status" => "error", "message" => "Metode request tidak valid"));
}
