<?php
// Pastikan Anda memiliki koneksi ke database dan telah memuat file functions.php di sini.
require_once('functions.php');

// Buat instance dari kelas GpsTrackingSystem
$gpsTracker = new GpsTrackingSystem();

// Periksa jika request datang dari metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah data yang diperlukan telah diterima dari form
    if (isset($_POST['nama_lokasi'])) {

        // Ambil data dari form
        $nama_lokasi = $_POST['nama_lokasi'];

        // Panggil fungsi tambahDataMotor() dari instance $gpsTracker
        $result = $gpsTracker->tambahDataLokasi($nama_lokasi);

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
