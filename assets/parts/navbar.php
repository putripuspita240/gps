<?php
// Mulai sesi untuk memeriksa status login
session_start();
?>

<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-bran d" href="index.php">
                <img src="assets/img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            </a>
            <a class="navbar-brand" href="#">GPS Tracking Motorcycle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="motor.php">Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lokasi.php">Lokasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pengguna.php">Pengguna</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex ml-auto">
                <a class="nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
<?php else : ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                GPS Tracking Motorcycle
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang Kami</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex ml-auto">
                <a class="nav-link" href="login.php">Login</a>
            </div>
        </div>
    </nav>
<?php endif; ?>