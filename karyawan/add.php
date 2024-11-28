<?php
include("../controllers/Karyawan.php");
include("../lib/functions.php");
$obj = new KaryawanController();
$msg = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $departemen = $_POST["departemen"];
    $status = $_POST["status"];
    $tgl_masuk = $_POST["tgl_masuk"];
    // Insert the database record using your controller's method
    $dat = $obj->addKaryawan($nik, $nama, $jk, $departemen, $status, $tgl_masuk);
    $msg = getJSON($dat);
}
?>
<html>
<head>
    <title>Karyawan</title>
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
                <h1 class="text-center mb-4">Add New Karyawan</h1>
                <p class="text-center text-muted mb-4">Entry New Employee Data</p>

                <?php 
                if ($msg === true) { 
                    echo '<div class="alert alert-success">Insert Data Berhasil</div>';
                    echo '<meta http-equiv="refresh" content="2;url='.base_url().'karyawan/">';
                } elseif ($msg === false) {
                    echo '<div class="alert alert-danger">Insert Gagal</div>'; 
                }
                ?>

                <form name="formAdd" method="POST" action="">
                    <div class="mb-4">
                        <label for="nik" class="form-label">NIK:</label>
                        <input type="text" id="nik" name="nik" class="form-control" required />
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control" required />
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
                        <label for="departemen" class="form-label">Departemen:</label>
                        <select id="departemen" name="departemen" class="form-select" required>
                            <option value="">--pilih--</option>
                            <option value="IT">IT</option>
                            <option value="HR">HR</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Operations">Operations</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="form-label">Status:</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="">--pilih--</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="tgl_masuk" class="form-label">Tanggal Masuk:</label>
                        <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" required />
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
