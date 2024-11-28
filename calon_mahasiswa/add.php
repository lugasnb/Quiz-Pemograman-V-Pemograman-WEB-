<?php
include("../controllers/CalonMahasiswa.php");
include("../lib/functions.php");
$obj = new CalonMahasiswaController();
$msg = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $nomor_registrasi = $_POST["nomor_registrasi"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $sekolah_asal = $_POST["sekolah_asal"];
    $jurusan = $_POST["jurusan"];
    $lulusan_tahun = $_POST["lulusan_tahun"];
    
    // Insert the database record using your controller's method
    $dat = $obj->addCalonMahasiswa($nomor_registrasi, $nama, $jk, $tgl_lahir, $sekolah_asal, $jurusan, $lulusan_tahun);
    $msg = getJSON($dat);
}
?>
<html>
<head>
    <title>Calon Mahasiswa</title>
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
                <h1 class="text-center mb-4">Add New Calon Mahasiswa</h1>
                <p class="text-center text-muted mb-4">Entry New Student Data</p>

                <?php 
                if ($msg === true) { 
                    echo '<div class="alert alert-success">Insert Data Berhasil</div>';
                    echo '<meta http-equiv="refresh" content="2;url='.base_url().'calon_mahasiswa/">';
                } elseif ($msg === false) {
                    echo '<div class="alert alert-danger">Insert Gagal</div>'; 
                }
                ?>

                <form name="formAdd" method="POST" action="">
                    <div class="mb-4">
                        <label for="nomor_registrasi" class="form-label">Nomor Registrasi:</label>
                        <input type="text" id="nomor_registrasi" name="nomor_registrasi" class="form-control" required />
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
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" required />
                    </div>
                    <div class="mb-4">
                        <label for="sekolah_asal" class="form-label">Sekolah Asal:</label>
                        <input type="text" id="sekolah_asal" name="sekolah_asal" class="form-control" required />
                    </div>
                    <div class="mb-4">
                        <label for="jurusan" class="form-label">Jurusan:</label>
                        <input type="text" id="jurusan" name="jurusan" class="form-control" required />
                    </div>
                    <div class="mb-4">
                        <label for="lulusan_tahun" class="form-label">Lulusan Tahun:</label>
                        <input type="number" id="lulusan_tahun" name="lulusan_tahun" class="form-control" required />
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
