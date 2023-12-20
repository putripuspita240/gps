<?php
// Pastikan Anda memiliki koneksi ke database dan telah memuat file functions.php di sini.
require_once('functions.php');

// Buat instance dari kelas GpsTrackingSystem
$gpsTracker = new GpsTrackingSystem();

// Ambil data motor berdasarkan ID (misalnya dari parameter URL)
$idLokasi = $_GET['id']; // Di sini Anda harus menyesuaikan dengan cara Anda mendapatkan ID dari URL
$dataLokasi = $gpsTracker->getDataLokasiById($idLokasi);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GPS Tracking Motorcycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!-- Navbar -->
    <?php include 'assets/parts/navbar.php'; ?>
    <!-- End Navbar -->

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Ubah Data lokasi</h2>

                <!-- Bagian form untuk mengubah data motor -->
                <form method="post" action="proses_ubah_lokasi.php">
                    <input type="hidden" id="id" name="id" value="<?php echo $dataLokasi['id']; ?>">

                    <div class=" mb-3">
                        <label for="nama_lokasi" class="form-label">Nama Lokasi:</label>
                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="<?php echo $dataLokasi['nama_lokasi']; ?>">
                    </div>

                    <button type=" submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>