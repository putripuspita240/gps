<?php
require_once('functions.php');

// Buat instance dari kelas GpsTrackingSystem
$gpsTracker = new GpsTrackingSystem();
// Periksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    // Tangkap nilai id motor yang akan dihapus
    $idPengguna = $_GET['id'];

    // Panggil fungsi hapusDataPengguna dari objek $gpsTracker untuk menghapus data motor berdasarkan ID
    $result = $gpsTracker->hapusDataPengguna($idPengguna);

    // Lakukan query penghapusan
    if ($result === TRUE) {
        // Redirect ke halaman lain atau lakukan sesuatu setelah berhasil dihapus
        header("Location: pengguna.php");
        exit();
    } else {
        echo "<script>alert('Error: $result');</script>"; // Tampilkan pesan error jika query gagal dijalankan
    }

    // Tutup koneksi ke database jika sudah selesai
    // ...
} else {
    header("Location: index.php");
}

// Tutup koneksi ke database
$gpsTracker->closeConnection();
