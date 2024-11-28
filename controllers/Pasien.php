<?php
include_once('../models/PasienModel.php');

class PasienController
{
    private $model;

    public function __construct()
    {
        $this->model = new PasienModel();
    }

    public function addPasien($no_ktp, $nama_pasien, $jk, $tgl_lahir, $alamat)
    {
        return $this->model->addPasien($no_ktp, $nama_pasien, $jk, $tgl_lahir, $alamat);
    }

    public function getPasien($id)
    {
        return $this->model->getPasien($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getPasien($id);
        foreach ($rows as $row) {
            $val = $row['nama_pasien'];
        }
        return $val;
    }

    public function updatePasien($id, $no_ktp, $nama_pasien, $jk, $tgl_lahir, $alamat)
    {
        return $this->model->updatePasien($id, $no_ktp, $nama_pasien, $jk, $tgl_lahir, $alamat);
    }

    public function deletePasien($id)
    {
        return $this->model->deletePasien($id);
    }

    public function getPasienList()
    {
        return $this->model->getPasienList();
    }

    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
?>
