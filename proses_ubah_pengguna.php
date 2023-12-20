<?php
require_once('functions.php');

// Buat instance dari kelas GpsTrackingSystem
$gpsTracker = new GpsTrackingSystem();

// Periksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data yang dikirimkan melalui form
    $id = $_POST['id'];
    $username = $_POST['username'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Panggil fungsi untuk mengubah data motor
    $result = $gpsTracker->ubahDataPengguna($id, $username, $nama_pengguna, $password, $email);

    // Cek hasil operasi
    if ($result === true) {
        // Redirect ke halaman lain jika berhasil
        header("Location: pengguna.php");
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
