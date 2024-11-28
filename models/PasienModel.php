<?php

include_once('../db/database.php');

class PasienModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Add new pasien (patient)
    public function addPasien($no_ktp, $nama_pasien, $jk, $tgl_lahir, $alamat)
    {
        $sql = "INSERT INTO pasien (no_ktp, nama_pasien, jk, tgl_lahir, alamat) 
                VALUES (:no_ktp, :nama_pasien, :jk, :tgl_lahir, :alamat)";
        $params = array(
            ":no_ktp" => $no_ktp,
            ":nama_pasien" => $nama_pasien,
            ":jk" => $jk,
            ":tgl_lahir" => $tgl_lahir,
            ":alamat" => $alamat
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

    // Get pasien (patient) by id
    public function getPasien($id)
    {
        $sql = "SELECT * FROM pasien WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update pasien data
    public function updatePasien($id, $no_ktp, $nama_pasien, $jk, $tgl_lahir, $alamat)
    {
        $sql = "UPDATE pasien SET no_ktp = :no_ktp, nama_pasien = :nama_pasien, jk = :jk, 
                tgl_lahir = :tgl_lahir, alamat = :alamat WHERE id = :id";
        $params = array(
            ":no_ktp" => $no_ktp,
            ":nama_pasien" => $nama_pasien,
            ":jk" => $jk,
            ":tgl_lahir" => $tgl_lahir,
            ":alamat" => $alamat,
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

    // Delete pasien by id
    public function deletePasien($id)
    {
        $sql = "DELETE FROM pasien WHERE id = :id";
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

    // Get list of all pasien
    public function getPasienList()
    {
        $sql = 'SELECT * FROM pasien';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get data for combo (dropdown) options
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM pasien';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

?>
