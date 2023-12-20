<?php
// Pastikan Anda memiliki koneksi ke database dan telah memuat file functions.php di sini.
require_once('functions.php');

// Buat instance dari kelas GpsTrackingSystem
$gpsTracker = new GpsTrackingSystem();

// Ambil data motor berdasarkan ID (misalnya dari parameter URL)
$idMotor = $_GET['id']; // Di sini Anda harus menyesuaikan dengan cara Anda mendapatkan ID dari URL
$dataMotor = $gpsTracker->getDataMotorById($idMotor);
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
                <h2 class="text-center mb-4">Ubah Data Motor</h2>

                <!-- Bagian form untuk mengubah data motor -->
                <form method="post" action="proses_ubah_motor.php">
                    <input type="hidden" id="id" name="id" value="<?php echo $dataMotor['id']; ?>">

                    <div class=" mb-3">
                        <label for="nama_pengguna" class="form-label">Nama Pengguna:</label>
                        <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $dataMotor['nama_pengguna']; ?>">
                    </div>

                    <div class=" mb-3">
                        <label for="plat_motor" class="form-label">Plat Motor:</label>
                        <input type="text" class="form-control" id="plat_motor" name="plat_motor" value="<?php echo $dataMotor['plat_motor']; ?>">
                    </div>

                    <div class=" mb-3">
                        <label for="merek" class="form-label">Merek:</label>
                        <input type="text" class="form-control" id="merek" name="merek" value="<?php echo $dataMotor['merek']; ?>">
                    </div>

                    <div class=" mb-3">
                        <label for="tahun" class="form-label">Tahun:</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $dataMotor['tahun']; ?>">
                    </div>

                    <button type=" submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>