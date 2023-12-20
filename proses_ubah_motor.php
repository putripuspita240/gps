<?php
require_once('functions.php');

// Buat instance dari kelas GpsTrackingSystem
$gpsTracker = new GpsTrackingSystem();

// Periksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data yang dikirimkan melalui form
    $id = $_POST['id'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $plat_motor = $_POST['plat_motor'];
    $merek = $_POST['merek'];
    $tahun = $_POST['tahun'];

    // Panggil fungsi untuk mengubah data motor
    $result = $gpsTracker->ubahDataMotor($id, $nama_pengguna, $plat_motor, $merek, $tahun);

    // Cek hasil operasi
    if ($result === true) {
        // Redirect ke halaman lain jika berhasil
        header("Location: motor.php");
        exit();
    } else {
        // Tampilkan pesan error jika terjadi kesalahan
        echo "Terjadi kesalahan: " . $result;
    }

    // Tutup koneksi database
    $gpsTracker->closeConnection();
} else {
    // Redirect jika akses langsung ke file ini tanpa melalui form
    header("Location: index.php");
    exit();
}
