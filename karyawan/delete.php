<?php
include("../controllers/Karyawan.php");
include("../lib/functions.php");
$obj = new KaryawanController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST['submitted']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'];
    $dat = $obj->deleteKaryawan($id);
    $msg = getJSON($dat);
}

$rows = $obj->getKaryawan($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Karyawan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="text-center mb-4">Delete Karyawan</h1>
                <p class="text-center text-muted mb-4">Are you sure you want to delete this data?</p>

                <?php 
                if ($msg === true) { 
                    echo '<div class="bg-success text-white p-3 rounded mb-4">Delete Data Berhasil</div>';
                    echo '<meta http-equiv="refresh" content="3;url='.base_url().'karyawan/">';
                } elseif ($msg === false) {
                    echo '<div class="bg-danger text-white p-3 rounded mb-4">Delete Gagal</div>'; 
                }
                ?>

                <div class="flex items-center mb-4">
                    <i class="fas fa-user-times fa-4x mr-4"></i>
                    <h2 class="text-xl font-semibold">Delete Data Karyawan</h2>
                </div>
                <hr class="mb-4"/>

                <form name="formDelete" method="POST" action="">
                    <input type="hidden" name="submitted" value="1"/>
                    <dl class="row mt-1">
                        <?php foreach ($rows as $row): ?>
                            <dt class="col-sm-3 font-medium text-gray-700">ID:</dt>
                            <dd class="col-sm-9"><?php echo $row['id']; ?></dd>
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" readonly />

                            <dt class="col-sm-3 font-medium text-gray-700">NIK:</dt>
                            <dd class="col-sm-9"><?php echo $row['nik']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">Nama:</dt>
                            <dd class="col-sm-9"><?php echo $row['nama']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">JK:</dt>
                            <dd class="col-sm-9"><?php echo $row['jk']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">Departemen:</dt>
                            <dd class="col-sm-9"><?php echo $row['departemen']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">Status:</dt>
                            <dd class="col-sm-9"><?php echo $row['status']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">Tanggal Masuk:</dt>
                            <dd class="col-sm-9"><?php echo $row['tgl_masuk']; ?></dd>
                        <?php endforeach; ?>
                    </dl>
                    <div class="flex justify-between mt-4">
                        <button class="btn btn-danger w-48" type="submit">Delete</button>
                        <a href="index.php" class="btn btn-secondary w-48">Cancel</a>
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
