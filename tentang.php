<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GPS Tracking Motorcycle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/tentang.css">
</head>

<body>

    <!-- Navbar -->
    <?php include 'assets/parts/navbar.php'; ?>
    <!-- End Navbar -->

    <!-- Hero -->
    <header>
        <div class="hero">
            <h1>Tentang Kami</h1>
            <p>Kami adalah solusi GPS untuk motor yang andal.</p>
            <button id="learnMoreBtn"><a href="#info">Pelajari Lebih Lanjut</a></button>
        </div>
    </header>
    <!-- End Hero -->

    <!-- Section -->
    <section class="info" id="info">
        <div class="info-image">
            <img src="assets/img/tracking.png" width="90%" alt="Motorcycle Image">
        </div>
        <div class="info-content">
            <h1>GPS Tracking Motorcycle</h1>
            <p>
                GPS Tracking Motorcycle adalah solusi cerdas untuk melacak dan mengamankan sepeda motor Anda. Dengan teknologi canggih, Anda dapat memantau perjalanan kendaraan Anda secara real-time dan mencegah pencurian.
            </p>
        </div>
    </section>
    <!-- End Section -->

    <!-- Container -->
    <div class="container">
        <div class="flip-box">
            <div class="flip-box-inner">
                <div class="flip-box-front">
                    <img src="assets/img/route.jpg" class="img-1" alt="Image 1">
                </div>
                <div class="flip-box-back">
                    <p>Riwayat Rute</p>
                </div>
            </div>
        </div>
        <div class="flip-box">
            <div class="flip-box-inner">
                <div class="flip-box-front">
                    <img src="assets/img/tracking.jpeg" class="img-1" alt="Image 2">
                </div>
                <div class="flip-box-back">
                    <p class="text-center">Pelacakan Lokasi Real Time</p>
                </div>
            </div>
        </div>
        <div class="flip-box">
            <div class="flip-box-inner">
                <div class="flip-box-front">
                    <img src="assets/img/theft.jpeg" class="img-1" alt="Image 3">
                </div>
                <div class="flip-box-back">
                    <p>Anti Pencurian</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <!-- Footer -->
    <?php include 'assets/parts/footer.php'; ?>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>