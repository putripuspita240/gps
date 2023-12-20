<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GPS Tracking Motorcycle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

  <!-- Navbar -->
  <?php include 'assets/parts/navbar.php'; ?>
  <!-- End Navbar -->

  <!-- Carousel -->
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/assets/img/gps.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Keamanan Sepanjang Perjalanan</h5>
          <p>Temukan solusi GPS tracking motor terbaik kami yang akan menjaga motor Anda selalu dalam pantauan.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/img/tracking.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Lacak dan Atur Motor Anda dengan Mudah</h5>
          <p>Kendalikan motor Anda dari jauh dengan aplikasi GPS tracking kami yang mudah digunakan.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/img/motorcycle.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Keamanan Sepanjang Waktu</h5>
          <p>Dengan sistem GPS tracking kami yang handal, nikmati keamanan nonstop untuk motor Anda.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- End Carousel -->

  <!-- Main -->
  <div class="container text-center mt-5 mb-5">
    <div class="row align-items-center">
      <div class="col info">
        <img src="/assets/img/map.png" width="100px" alt="" srcset="">
        <br>
        <h5>Real Time Location</h5>
      </div>
      <div class="col info">
        <img src="/assets/img/neural.png" width="100px" alt="" srcset="">
        <br>
        <h5>Easy Connect</h5>
      </div>
      <div class="col info">
        <img src="/assets/img/delivery.png" width="100px" alt="" srcset="">
        <br>
        <h5>Location History</h5>
      </div>
    </div>

    <div class="mt-5">
      <h2 id="tentangKami">Tentang Kami</h2>
      <p>GPS Tracking Motorcyle</p>
    </div>
  </div>

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-5">
        <!-- Kolom dengan gambar -->
        <img src="/assets/img/people.png" id="gambar" class="img-fluid zoomable" alt="Gambar Anda">
      </div>
      <div class="col-md-7">
        <!-- Tab dan konten tab tetap di sini -->
        <ul class="nav nav-tabs" id="myTabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tab1">Pelacakan Real Time</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab2">Temukan Lokasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab3">Geofencing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tab4">Riwayat Rute</a>
          </li>
        </ul>

        <div class="tab-content mt-5">
          <div id="tab1" class="tab-pane fade show active">
            <h3>Pelacakan Lokasi Real Time</h3>
            <p>Sistem GPS tracking memungkinkan pemilik sepeda motor atau manajer armada untuk memantau lokasi sepeda motor secara real- time melalui satelit GPS. Informasi ini biasanya dapat diakses melalui platform berbasis web atau aplikasi mobile.</p>
          </div>
          <div id="tab2" class="tab-pane fade">
            <h3>Temukan Lokasi</h3>
            <p>GPS tracker menyediakan cara yang efektif untuk menentukan lokasi yag akan anda tuju dengan rute yang dilengkapi dengan fitur rekomendasi rute terpendek dan notifikasi tentang kualitas udara yang ada selama rute perjalanan. </p>
          </div>
          <div id="tab3" class="tab-pane fade">
            <h3>Geofencing</h3>
            <p>fitur yang memungkinkan pengguna untuk mengatur batas virtual atau geofence di sekitar area tertentu. Ketika sepeda motor yang dilengkapi dengan GPS tracker memasuki atau keluar dari batas-batas ini, sistem akan mengirimkan peringatan kepada pemilik atau manajer armada, memberikan notifikasi secara langsung.</p>
          </div>
          <div id="tab4" class="tab-pane fade">
            <h3>Riwayat Rute</h3>
            <p>GPS tracking juga dapat menyimpan riwayat rute yang telah ditempuh oleh sepeda motor. Informasi ini dapat digunakan untuk analisis perjalanan, pemantauan kinerja, dan perencanaan perjalanan di masa depan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main -->

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