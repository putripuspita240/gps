<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Lokasi - GPS Tracking Motorcycle</title>
    <!-- Tautkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Tautkan DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

    <!-- Navbar -->
    <?php include 'assets/parts/navbar.php'; ?>
    <!-- End Navbar -->

    <div class="container mt-5">
        <h2 class="mb-4">Data Lokasi - GPS Tracking Motorcycle</h2>
        <!-- Tombol untuk membuka modal -->
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambahLokasiModal">Tambah Data Lokasi</button>

        <!-- Modal untuk menambah data motor -->
        <div class="modal fade" id="tambahLokasiModal" tabindex="-1" role="dialog" aria-labelledby="tambahLokasiModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahLokasiModalLabel">Tambah Data Lokasi</h5>
                        <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Kembali</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form tambah data motor -->
                        <form id="formTambahLokasi">
                            <div class="form-group">
                                <label for="nama_lokasi">Nama Lokasi:</label>
                                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table id="motorTabel" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Lokasi</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data motor akan dimuat di sini -->
            </tbody>
        </table>
    </div>


    <!-- Tautkan jQuery, Bootstrap JS, dan DataTables JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $(document).ready(function() {
            $('#motorTabel').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "get_lokasi_data.php",
                    "type": "POST"
                },
                "columns": [{
                        "data": null,
                        "render": function(data, type, row, meta) {
                            // Kolom nomor urut (ditambahkan di sini)
                            return meta.row + 1;
                        }
                    },
                    {
                        "data": "nama_lokasi"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<a class="btn btn-primary btn-sm mb-2" href="ubah_lokasi.php?id=' + row.id + '">Ubah</a>' +
                                '<form class="inline-block" method="post" action="hapus_lokasi.php?id=' + row.id + '" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')"><button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button></form>';
                        }
                    },
                    {
                        data: 'id',
                        visible: false
                    }

                ],
                columnDefs: [{
                    targets: -1,
                    visible: false,
                    searchable: false
                }],
                "rowId": 'rowId' // Menyertakan atribut rowId
            });

            // Tangani pengiriman form tambah motor
            $('#formTambahLokasi').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'tambah_lokasi.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#tambahLokasiModal').modal('hide');
                        if (response.status === 'success') {
                            // Jika penambahan berhasil, lakukan refresh halaman setelah beberapa detik
                            setTimeout(function() {
                                location.reload(); // Refresh halaman
                            }, 1000);
                        }
                    }
                });
            });

        });
    </script>
</body>

</html>