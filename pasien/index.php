<?php
include("../controllers/Pasien.php");
include("../lib/functions.php");
$obj = new PasienController();
$rows = $obj->getPasienList();
?>
<html>
<head>
    <title>Pasien</title>
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
                <h1 class="text-center mb-4">Pasien</h1>
                <p class="text-center text-muted mb-4">List All Data</p>
                <div class="text-end mb-4">
                    <a href="add.php" class="btn btn-success"><i class="fas fa-plus"></i> Create New Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>No. KTP</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row){ ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['no_ktp']; ?></td>
                                <td><?php echo $row['nama_pasien']; ?></td>
                                <td><?php echo $row['jk']; ?></td>
                                <td><?php echo $row['tgl_lahir']; ?></td>
                                <td><?php echo $row['alamat']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Edit</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
