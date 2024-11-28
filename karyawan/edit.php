<?php
include("../controllers/Karyawan.php");
include("../lib/functions.php");
$obj = new KaryawanController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST["id"];
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $jk = $_POST["jk"];
    $departemen = $_POST["departemen"];
    $status = $_POST["status"];
    $tgl_masuk = $_POST["tgl_masuk"];
    
    // Update the database record using your controller's method
    $dat = $obj->updateKaryawan($id, $nik, $nama, $jk, $departemen, $status, $tgl_masuk);
    $msg = getJSON($dat);
}

$rows = $obj->getKaryawan($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
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
                <h1 class="text-center mb-4">Edit Karyawan</h1>
                <p class="text-center text-muted mb-4">Edit Data Karyawan</p>

                <?php 
                if ($msg === true) { 
                    echo '<div class="bg-success text-white p-3 rounded mb-4">Update Data Berhasil</div>';
                    echo '<meta http-equiv="refresh" content="2;url='.base_url().'karyawan/">';
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
                            <label for="nik" class="form-label">NIK:</label>
                            <input type="text" id="nik" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" required/>
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
                            <label for="departemen" class="form-label">Departemen:</label>
                            <select id="departemen" name="departemen" class="form-select" required>
                                <option value="<?php echo $row['departemen']; ?>"><?php echo $row['departemen']; ?></option>
                                <option value="IT">IT</option>
                                <option value="HR">HR</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Operations">Operations</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select id="status" name="status" class="form-select" required>
                                <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                                <option value="Tetap">Tetap</option>
                                <option value="Kontrak">Kontrak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_masuk" class="form-label">Tanggal Masuk:</label>
                            <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" value="<?php echo $row['tgl_masuk']; ?>" required/>
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
