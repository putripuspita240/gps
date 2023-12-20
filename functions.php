<?php

class GpsTrackingSystem
{
    private $servername = "localhost"; // Nama server database
    private $username = "root"; // Username database
    private $password = ""; // Password database
    private $dbname = "gps"; // Nama database
    private $conn;

    // Konstruktor untuk koneksi database
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Fungsi login
    public function loginUser($username, $password)
    {
        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);

        $query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($query);

        if ($result->num_rows == 1) {
            // Login berhasil, set session
            session_start(); // Memulai atau melanjutkan sesi

            // Simpan informasi login ke dalam session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username; // Simpan username atau informasi lain yang diperlukan

            return true; // Login berhasil
        } else {
            return false; // Login gagal
        }
    }

    // Fungsi logout
    function logoutUser()
    {
        session_start(); // Memulai atau melanjutkan sesi

        // Unset semua variabel sesi
        $_SESSION = array();

        // Hapus cookie sesi jika ada
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Hancurkan sesi
        session_destroy();
    }

    // // Fungsi tambah data motor
    // public function addMotorData($motorName, $motorType, $motorPlate)
    // {
    //     $motorName = $this->conn->real_escape_string($motorName);
    //     $motorType = $this->conn->real_escape_string($motorType);
    //     $motorPlate = $this->conn->real_escape_string($motorPlate);

    //     $query = "INSERT INTO motor_data (motor_name, motor_type, motor_plate) VALUES ('$motorName', '$motorType', '$motorPlate')";
    //     $result = $this->conn->query($query);

    //     if ($result) {
    //         return true; // Data motor berhasil ditambahkan
    //     } else {
    //         return false; // Terjadi kesalahan
    //     }
    // }

    public function getMotorData()
    {
        $query = "SELECT * FROM data_motor";
        $result = $this->conn->query($query);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'id' => $row['id'],
                'nama_pengguna' => $row['nama_pengguna'],
                'plat_motor' => $row['plat_motor'],
                'merek' => $row['merek'],
                'tahun' => $row['tahun']
            );
        }

        return $data;
    }

    public function getDataMotorById($idMotor)
    {
        $idMotor = $this->conn->real_escape_string($idMotor);
        $query = "SELECT * FROM data_motor WHERE id = $idMotor";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function tambahDataMotor($nama_pengguna, $plat_motor, $merek, $tahun)
    {
        // Query untuk menambahkan data motor ke dalam tabel data_motor
        $query = "INSERT INTO data_motor (nama_pengguna, plat_motor, merek, tahun) VALUES (?, ?, ?, ?)";

        // Persiapkan statement untuk eksekusi query
        $stmt = $this->conn->prepare($query);

        // Bind parameter ke statement
        $stmt->bind_param("ssss", $nama_pengguna, $plat_motor, $merek, $tahun);

        // Lakukan eksekusi statement untuk menambahkan data motor
        if ($stmt->execute()) {
            // Jika berhasil, kirim respon sebagai indikasi sukses
            return array("status" => "success", "message" => "Data motor berhasil ditambahkan");
        } else {
            // Jika gagal, kirim respon sebagai indikasi kegagalan
            return array("status" => "error", "message" => "Gagal menambahkan data motor");
        }

        // Tutup statement
        $stmt->close();
    }

    // Fungsi untuk mengubah data motor berdasarkan ID
    public function ubahDataMotor($id, $nama_pengguna, $plat_motor, $merek, $tahun)
    {
        // Lindungi dari serangan SQL Injection
        $id = $this->conn->real_escape_string($id);
        $nama_pengguna = $this->conn->real_escape_string($nama_pengguna);
        $plat_motor = $this->conn->real_escape_string($plat_motor);
        $merek = $this->conn->real_escape_string($merek);
        $tahun = $this->conn->real_escape_string($tahun);

        // Query untuk mengubah data motor berdasarkan ID
        $query = "UPDATE data_motor SET nama_pengguna='$nama_pengguna', plat_motor='$plat_motor', merek='$merek', tahun='$tahun' WHERE id=$id";

        if ($this->conn->query($query) === TRUE) {
            // Jika data berhasil diubah
            return true;
        } else {
            // Jika terjadi kesalahan dalam proses mengubah data
            return "Error: " . $this->conn->error;
        }
    }

    // Fungsi untuk menghapus data motor berdasarkan ID
    public function hapusDataMotor($id)
    {
        // Lindungi dari serangan SQL Injection
        $id = $this->conn->real_escape_string($id);

        // Query untuk menghapus data motor berdasarkan ID
        $query = "DELETE FROM data_motor WHERE id=$id";

        if ($this->conn->query($query) === TRUE) {
            // Jika data berhasil dihapus
            return true;
        } else {
            // Jika terjadi kesalahan dalam proses menghapus data
            return "Error: " . $this->conn->error;
        }
    }

    // Lokasi
    public function getLokasiData()
    {
        $query = "SELECT * FROM lokasi";
        $result = $this->conn->query($query);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'id' => $row['id'],
                'nama_lokasi' => $row['nama_lokasi'],
            );
        }

        return $data;
    }

    public function getDataLokasiById($idLokasi)
    {
        $idLokasi = $this->conn->real_escape_string($idLokasi);
        $query = "SELECT * FROM lokasi WHERE id = $idLokasi";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function tambahDataLokasi($nama_lokasi)
    {
        // Query untuk menambahkan data motor ke dalam tabel lokasi
        $query = "INSERT INTO lokasi (nama_lokasi) VALUES (?)";

        // Persiapkan statement untuk eksekusi query
        $stmt = $this->conn->prepare($query);

        // Bind parameter ke statement
        $stmt->bind_param("s", $nama_lokasi);

        // Lakukan eksekusi statement untuk menambahkan data motor
        if ($stmt->execute()) {
            // Jika berhasil, kirim respon sebagai indikasi sukses
            return array("status" => "success", "message" => "Data lokasi berhasil ditambahkan");
        } else {
            // Jika gagal, kirim respon sebagai indikasi kegagalan
            return array("status" => "error", "message" => "Gagal menambahkan data lokasi");
        }

        // Tutup statement
        $stmt->close();
    }

    public function ubahDataLokasi($id, $nama_lokasi)
    {
        // Lindungi dari serangan SQL Injection
        $id = $this->conn->real_escape_string($id);
        $nama_lokasi = $this->conn->real_escape_string($nama_lokasi);

        // Query untuk mengubah data motor berdasarkan ID
        $query = "UPDATE lokasi SET nama_lokasi='$nama_lokasi' WHERE id=$id";

        if ($this->conn->query($query) === TRUE) {
            // Jika data berhasil diubah
            return true;
        } else {
            // Jika terjadi kesalahan dalam proses mengubah data
            return "Error: " . $this->conn->error;
        }
    }

    public function hapusDataLokasi($idLokasi)
    {
        // Lindungi dari serangan SQL Injection
        $idLokasi = $this->conn->real_escape_string($idLokasi);

        // Query untuk menghapus data motor berdasarkan ID
        $query = "DELETE FROM lokasi WHERE id=$idLokasi";

        if ($this->conn->query($query) === TRUE) {
            // Jika data berhasil dihapus
            return true;
        } else {
            // Jika terjadi kesalahan dalam proses menghapus data
            return "Error: " . $this->conn->error;
        }
    }

    // Pengguna
    public function getPenggunaData()
    {
        $query = "SELECT * FROM pengguna";
        $result = $this->conn->query($query);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'id' => $row['id'],
                'username' => $row['username'],
                'nama_pengguna' => $row['nama_pengguna'],
                'email' => $row['email']
            );
        }

        return $data;
    }

    public function getDataPenggunaById($idPengguna)
    {
        $idPengguna = $this->conn->real_escape_string($idPengguna);
        $query = "SELECT * FROM pengguna WHERE id = $idPengguna";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function tambahDataPengguna($username, $nama_pengguna, $password, $email)
    {
        // Query untuk menambahkan data motor ke dalam tabel lokasi
        $query = "INSERT INTO pengguna (username, nama_pengguna, password, email) VALUES (?,?,?,?)";

        // Persiapkan statement untuk eksekusi query
        $stmt = $this->conn->prepare($query);

        // Bind parameter ke statement
        $stmt->bind_param("ssss", $username, $nama_pengguna, $password, $email);

        // Lakukan eksekusi statement untuk menambahkan data motor
        if ($stmt->execute()) {
            // Jika berhasil, kirim respon sebagai indikasi sukses
            return array("status" => "success", "message" => "Data pengguna berhasil ditambahkan");
        } else {
            // Jika gagal, kirim respon sebagai indikasi kegagalan
            return array("status" => "error", "message" => "Gagal menambahkan data pengguna");
        }

        // Tutup statement
        $stmt->close();
    }

    public function ubahDataPengguna($id, $username, $nama_pengguna, $password, $email)
    {
        // Lindungi dari serangan SQL Injection
        $id = $this->conn->real_escape_string($id);
        $username = $this->conn->real_escape_string($username);
        $nama_pengguna = $this->conn->real_escape_string($nama_pengguna);
        $password = $this->conn->real_escape_string($password);
        $email = $this->conn->real_escape_string($email);

        // Query untuk mengubah data motor berdasarkan ID
        $query = "UPDATE pengguna SET username='$username', nama_pengguna='$nama_pengguna', password='$password', email='$email' WHERE id=$id";

        if ($this->conn->query($query) === TRUE) {
            // Jika data berhasil diubah
            return true;
        } else {
            // Jika terjadi kesalahan dalam proses mengubah data
            return "Error: " . $this->conn->error;
        }
    }

    public function hapusDataPengguna($idPengguna)
    {
        // Lindungi dari serangan SQL Injection
        $idPengguna = $this->conn->real_escape_string($idPengguna);

        // Query untuk menghapus data motor berdasarkan ID
        $query = "DELETE FROM pengguna WHERE id=$idPengguna";

        if ($this->conn->query($query) === TRUE) {
            // Jika data berhasil dihapus
            return true;
        } else {
            // Jika terjadi kesalahan dalam proses menghapus data
            return "Error: " . $this->conn->error;
        }
    }

    // Fungsi untuk melakukan sanitasi input
    private function sanitizeInput($input)
    {
        return $this->conn->real_escape_string($input);
    }

    // Menutup koneksi database
    public function closeConnection()
    {
        $this->conn->close();
    }
}

// Contoh penggunaan kelas GpsTrackingSystem:
$gpsTracker = new GpsTrackingSystem();
// Gunakan fungsi-fungsi yang diperlukan di sini, contoh:
// $gpsTracker->loginUser($username, $password);
// $gpsTracker->addMotorData($motorName, $motorType, $motorPlate);
// $gpsTracker->addLocationData($motorID, $latitude, $longitude, $timestamp);

// Tutup koneksi database setelah selesai
$gpsTracker->closeConnection();
