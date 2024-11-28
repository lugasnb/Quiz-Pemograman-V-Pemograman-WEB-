<?php
include("../controllers/Pasien.php");
include("../lib/functions.php");
$obj = new PasienController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST['submitted']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'];
    $dat = $obj->deletePasien($id);
    $msg = getJSON($dat);
}

$rows = $obj->getPasien($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Pasien</title>
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
                <h1 class="text-center mb-4">Delete Pasien</h1>
                <p class="text-center text-muted mb-4">Are you sure you want to delete this data?</p>

                <?php 
                if ($msg === true) { 
                    echo '<div class="bg-success text-white p-3 rounded mb-4">Delete Data Berhasil</div>';
                    echo '<meta http-equiv="refresh" content="3;url='.base_url().'pasien/">';
                } elseif ($msg === false) {
                    echo '<div class="bg-danger text-white p-3 rounded mb-4">Delete Gagal</div>'; 
                }
                ?>

                <div class="flex items-center mb-4">
                    <i class="fas fa-user-times fa-4x mr-4"></i>
                    <h2 class="text-xl font-semibold">Delete Data Pasien</h2>
                </div>
                <hr class="mb-4"/>

                <form name="formDelete" method="POST" action="">
                    <input type="hidden" name="submitted" value="1"/>
                    <dl class="row mt-1">
                        <?php foreach ($rows as $row): ?>
                            <dt class="col-sm-3 font-medium text-gray-700">ID:</dt>
                            <dd class="col-sm-9"><?php echo $row['id']; ?></dd>
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" readonly />

                            <dt class="col-sm-3 font-medium text-gray-700">No KTP:</dt>
                            <dd class="col-sm-9"><?php echo $row['no_ktp']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">Nama Pasien:</dt>
                            <dd class="col-sm-9"><?php echo $row['nama_pasien']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">JK:</dt>
                            <dd class="col-sm-9"><?php echo $row['jk']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">Tanggal Lahir:</dt>
                            <dd class="col-sm-9"><?php echo $row['tgl_lahir']; ?></dd>

                            <dt class="col-sm-3 font-medium text-gray-700">Alamat:</dt>
                            <dd class="col-sm-9"><?php echo $row['alamat']; ?></dd>
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
