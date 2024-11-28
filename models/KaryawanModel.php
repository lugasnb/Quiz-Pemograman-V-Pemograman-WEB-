<?php

include_once('../db/database.php');

class KaryawanModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Add new karyawan (employee)
    public function addKaryawan($nik, $nama, $jk, $departemen, $status, $tgl_masuk)
    {
        $sql = "INSERT INTO karyawan (nik, nama, jk, departemen, status, tgl_masuk) 
                VALUES (:nik, :nama, :jk, :departemen, :status, :tgl_masuk)";
        $params = array(
            ":nik" => $nik,
            ":nama" => $nama,
            ":jk" => $jk,
            ":departemen" => $departemen,
            ":status" => $status,
            ":tgl_masuk" => $tgl_masuk
        );

        $result = $this->db->executeQuery($sql, $params);
        
        // Check if the insert was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }

        // Return the response as JSON
        return json_encode($response);
    }

    // Get karyawan (employee) by id
    public function getKaryawan($id)
    {
        $sql = "SELECT * FROM karyawan WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update karyawan data
    public function updateKaryawan($id, $nik, $nama, $jk, $departemen, $status, $tgl_masuk)
    {
        $sql = "UPDATE karyawan SET nik = :nik, nama = :nama, jk = :jk, departemen = :departemen, 
                status = :status, tgl_masuk = :tgl_masuk WHERE id = :id";
        $params = array(
            ":nik" => $nik,
            ":nama" => $nama,
            ":jk" => $jk,
            ":departemen" => $departemen,
            ":status" => $status,
            ":tgl_masuk" => $tgl_masuk,
            ":id" => $id
        );

        // Execute the query
        $result = $this->db->executeQuery($sql, $params);

        // Check if the update was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }

        // Return the response as JSON
        return json_encode($response);
    }

    // Delete karyawan by id
    public function deleteKaryawan($id)
    {
        $sql = "DELETE FROM karyawan WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);

        // Check if the delete was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }

        // Return the response as JSON
        return json_encode($response);
    }

    // Get list of all karyawan
    public function getKaryawanList()
    {
        $sql = 'SELECT * FROM karyawan';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get data for combo (dropdown) options
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM karyawan';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

?>
