<?php
include("../controllers/CalonMahasiswa.php");
include("../lib/functions.php");
$obj = new CalonMahasiswaController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST["id"];
    $nomor_registrasi = $_POST["nomor_registrasi"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $sekolah_asal = $_POST["sekolah_asal"];
    $jurusan = $_POST["jurusan"];
    $lulusan_tahun = $_POST["lulusan_tahun"];
    
    // Update the database record using your controller's method
    $dat = $obj->updateCalonMahasiswa($id, $nomor_registrasi, $nama, $jk, $tgl_lahir, $sekolah_asal, $jurusan, $lulusan_tahun);
    $msg = getJSON($dat);
}

$rows = $obj->getCalonMahasiswa($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Calon Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="text-center mb-4">Edit Calon Mahasiswa</h1>
                <p class="text-center text-muted mb-4">Edit Data Calon Mahasiswa</p>

                <?php 
                if ($msg === true) { 
                    echo '<div class="bg-success text-white p-3 rounded mb-4">Update Data Berhasil</div>';
                    echo '<meta http-equiv="refresh" content="2;url='.base_url().'calon_mahasiswa/">';
                } elseif ($msg === false) {
                    echo '<div class="bg-danger text-white p-3 rounded mb-4">Update Gagal</div>'; 
                }
                ?>

                <form name="formEdit" method="POST" action="">
                    <input type="hidden" name="submitted" value="1"/>
                    <?php foreach ($rows as $row): ?>
                        <div class="mb-3">
                            <label for="id" class="form-label">ID:</label>
                            <input type="text" id="id" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly/>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_registrasi" class="form-label">Nomor Registrasi:</label>
                            <input type="text" id="nomor_registrasi" name="nomor_registrasi" class="form-control" value="<?php echo $row['nomor_registrasi']; ?>" required/>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required/>
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin:</label>
                            <select id="jk" name="jk" class="form-select" required>
                                <option value="<?php echo $row['jk']; ?>"><?php echo $row['jk']; ?></option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" value="<?php echo $row['tgl_lahir']; ?>" required/>
                        </div>
                        <div class="mb-3">
                            <label for="sekolah_asal" class="form-label">Sekolah Asal:</label>
                            <input type="text" id="sekolah_asal" name="sekolah_asal" class="form-control" value="<?php echo $row['sekolah_asal']; ?>" required/>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan:</label>
                            <input type="text" id="jurusan" name="jurusan" class="form-control" value="<?php echo $row['jurusan']; ?>" required/>
                        </div>
                        <div class="mb-3">
                            <label for="lulusan_tahun" class="form-label">Lulusan Tahun:</label>
                            <input type="number" id="lulusan_tahun" name="lulusan_tahun" class="form-control" value="<?php echo $row['lulusan_tahun']; ?>" required/>
                        </div>
                    <?php endforeach; ?>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
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
