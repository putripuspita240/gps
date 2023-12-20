<?php ?>
<?php
// Jika form login disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include file functions.php
    require_once('functions.php');

    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Membuat instance dari class GpsTrackingSystem
    $gpsTracker = new GpsTrackingSystem();

    // Melakukan login
    if ($gpsTracker->loginUser($username, $password)) {
        // Jika login berhasil, redirect atau tampilkan pesan sukses
        // Anda bisa melakukan redirect ke halaman lain di sini
        header("Location: index.php");
        exit(); // Penting untuk menghentikan eksekusi selanjutnya setelah redirect
    } else {
        echo '<div class="alert alert-danger" role="alert">Login gagal. Silakan coba lagi.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - GPS Tracking Motorcycle</title>
    <!-- Tautkan Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan library Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Login - GPS Tracking Motorcycle</h2>

                <!-- Form login menggunakan Bootstrap -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Tautkan Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Tambahkan JavaScript untuk fungsi toggle password -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>