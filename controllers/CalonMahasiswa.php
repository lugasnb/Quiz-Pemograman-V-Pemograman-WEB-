<?php
include_once('../models/CalonMahasiswaModel.php');

class CalonMahasiswaController
{
    private $model;

    public function __construct()
    {
        $this->model = new CalonMahasiswaModel();
    }

    // Add new calon mahasiswa (prospective student)
    public function addCalonMahasiswa($nomor_registrasi, $nama, $jk, $tanggal_lahir, $sekolah_asal, $jurusan, $lulus_tahun)
    {
        return $this->model->addCalonMahasiswa($nomor_registrasi, $nama, $jk, $tanggal_lahir, $sekolah_asal, $jurusan, $lulus_tahun);
    }

    // Get calon mahasiswa (prospective student) by id
    public function getCalonMahasiswa($id)
    {
        return $this->model->getCalonMahasiswa($id);
    }

    // Show calon mahasiswa name by id
    public function Show($id)
    {
        $rows = $this->model->getCalonMahasiswa($id);
        foreach ($rows as $row) {
            $val = $row['nama'];
        }
        return $val;
    }

    // Update calon mahasiswa data
    public function updateCalonMahasiswa($id, $nomor_registrasi, $nama, $jk, $tanggal_lahir, $sekolah_asal, $jurusan, $lulus_tahun)
    {
        return $this->model->updateCalonMahasiswa($id, $nomor_registrasi, $nama, $jk, $tanggal_lahir, $sekolah_asal, $jurusan, $lulus_tahun);
    }

    // Delete calon mahasiswa by id
    public function deleteCalonMahasiswa($id)
    {
        return $this->model->deleteCalonMahasiswa($id);
    }

    // Get list of all calon mahasiswa
    public function getCalonMahasiswaList()
    {
        return $this->model->getCalonMahasiswaList();
    }

    // Get data for combo (dropdown) options
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
?>
