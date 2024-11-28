<?php
include("../controllers/Pasien.php");
include("../lib/functions.php");
$obj = new PasienController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST["id"];
    $no_ktp = $_POST["no_ktp"];
    $nama_pasien = $_POST["nama_pasien"];
    $jk = $_POST["jk"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $alamat = $_POST["alamat"];
    
    // Update the database record using your controller's method
    $dat = $obj->updatePasien($id, $no_ktp, $nama_pasien, $jk, $tgl_lahir, $alamat);
    $msg = getJSON($dat);
}

$rows = $obj->getPasien($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien</title>
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
                <h1 class="text-center mb-4">Edit Pasien</h1>
                <p class="text-center text-muted mb-4">Edit Data Pasien</p>

                <?php 
                if ($msg === true) { 
                    echo '<div class="bg-success text-white p-3 rounded mb-4">Update Data Berhasil</div>';
                    echo '<meta http-equiv="refresh" content="2;url='.base_url().'pasien/">';
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
                            <label for="no_ktp" class="form-label">No. KTP:</label>
                            <input type="text" id="no_ktp" name="no_ktp" class="form-control" value="<?php echo $row['no_ktp']; ?>" required/>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label">Nama Pasien:</label>
                            <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" value="<?php echo $row['nama_pasien']; ?>" required/>
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
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea id="alamat" name="alamat" class="form-control" rows="3" required><?php echo $row['alamat']; ?></textarea>
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
