<?php
include("../controllers/Pasien.php");
include("../lib/functions.php");
$obj = new PasienController();
$msg = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the insert here
    $no_ktp = $_POST["no_ktp"];
    $nama_pasien = $_POST["nama_pasien"];
    $jk = $_POST["jk"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $alamat = $_POST["alamat"];
    // Insert the database record using your controller's method
    $dat = $obj->addPasien($no_ktp, $nama_pasien, $jk, $tgl_lahir, $alamat);
    $msg = getJSON($dat);
}
?>
<html>
<head>
    <title>Pasien</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="text-center mb-4">Add New Pasien</h1>
                <p class="text-center text-muted mb-4">Entry New Patient Data</p>

                <?php 
                if ($msg === true) { 
                    echo '<div class="alert alert-success">Insert Data Berhasil</div>';
                    echo '<meta http-equiv="refresh" content="2;url='.base_url().'pasien/">';
                } elseif ($msg === false) {
                    echo '<div class="alert alert-danger">Insert Gagal</div>'; 
                }
                ?>

                <form name="formAdd" method="POST" action="">
                    <div class="mb-4">
                        <label for="no_ktp" class="form-label">No. KTP:</label>
                        <input type="text" id="no_ktp" name="no_ktp" class="form-control" required />
                    </div>
                    <div class="mb-4">
                        <label for="nama_pasien" class="form-label">Nama Pasien:</label>
                        <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" required />
                    </div>
                    <div class="mb-4">
                        <label for="jk" class="form-label">Jenis Kelamin:</label>
                        <select id="jk" name="jk" class="form-select" required>
                            <option value="">--pilih--</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" required />
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a href="#index" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
