<?php
include_once('../models/KaryawanModel.php');

class KaryawanController
{
    private $model;

    public function __construct()
    {
        $this->model = new KaryawanModel();
    }

    public function addKaryawan($nik, $nama, $jk, $departemen, $status, $tgl_masuk)
    {
        return $this->model->addKaryawan($nik, $nama, $jk, $departemen, $status, $tgl_masuk);
    }

    public function getKaryawan($id)
    {
        return $this->model->getKaryawan($id);
    }

    public function Show($id)
    {
        $rows = $this->model->getKaryawan($id);
        foreach($rows as $row){
            $val = $row['nama'];
        }
        return $val;
    }

    public function updateKaryawan($id, $nik, $nama, $jk, $departemen, $status, $tgl_masuk)
    {
        return $this->model->updateKaryawan($id, $nik, $nama, $jk, $departemen, $status, $tgl_masuk);
    }

    public function deleteKaryawan($id)
    {
        return $this->model->deleteKaryawan($id);
    }

    public function getKaryawanList()
    {
        return $this->model->getKaryawanList();
    }

    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
?>
