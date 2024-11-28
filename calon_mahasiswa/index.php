<?php
include("../controllers/CalonMahasiswa.php");
include("../lib/functions.php");
$obj = new CalonMahasiswaController();
$rows = $obj->getCalonMahasiswaList();
?>
<html>
<head>
    <title>Calon Mahasiswa</title>
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
                <h1 class="text-center mb-4">Calon Mahasiswa</h1>
                <p class="text-center text-muted mb-4">List All Data</p>
                <div class="text-end mb-4">
                    <a href="add.php" class="btn btn-success"><i class="fas fa-plus"></i> Create New Data</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nomor Registrasi</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Sekolah Asal</th>
                                <th>Jurusan</th>
                                <th>Lulusan Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row){ ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nomor_registrasi']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['jk'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                                <td><?php echo $row['tgl_lahir']; ?></td>
                                <td><?php echo $row['sekolah_asal']; ?></td>
                                <td><?php echo $row['jurusan']; ?></td>
                                <td><?php echo $row['lulusan_tahun']; ?></td>
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
