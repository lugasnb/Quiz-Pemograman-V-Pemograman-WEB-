<?php

include_once('../db/database.php');

class CalonMahasiswaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Add new calon mahasiswa (prospective student)
    public function addCalonMahasiswa($nomor_registrasi, $nama, $jk, $tgl_lahir, $sekolah_asal, $jurusan, $lulusan_tahun)
    {
        $sql = "INSERT INTO calon_mahasiswa (nomor_registrasi, nama, jk, tgl_lahir, sekolah_asal, jurusan, lulusan_tahun) 
                VALUES (:nomor_registrasi, :nama, :jk, :tgl_lahir, :sekolah_asal, :jurusan, :lulusan_tahun)";
        $params = array(
            ":nomor_registrasi" => $nomor_registrasi,
            ":nama" => $nama,
            ":jk" => $jk,
            ":tgl_lahir" => $tgl_lahir,
            ":sekolah_asal" => $sekolah_asal,
            ":jurusan" => $jurusan,
            ":lulusan_tahun" => $lulusan_tahun
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

    // Get calon mahasiswa by id
    public function getCalonMahasiswa($id)
    {
        $sql = "SELECT * FROM calon_mahasiswa WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update calon mahasiswa data
    public function updateCalonMahasiswa($id, $nomor_registrasi, $nama, $jk, $tgl_lahir, $sekolah_asal, $jurusan, $lulusan_tahun)
    {
        $sql = "UPDATE calon_mahasiswa SET nomor_registrasi = :nomor_registrasi, nama = :nama, jk = :jk, 
                tgl_lahir = :tgl_lahir, sekolah_asal = :sekolah_asal, jurusan = :jurusan, lulusan_tahun = :lulusan_tahun 
                WHERE id = :id";
        $params = array(
            ":nomor_registrasi" => $nomor_registrasi,
            ":nama" => $nama,
            ":jk" => $jk,
            ":tgl_lahir" => $tgl_lahir,
            ":sekolah_asal" => $sekolah_asal,
            ":jurusan" => $jurusan,
            ":lulusan_tahun" => $lulusan_tahun,
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

    // Delete calon mahasiswa by id
    public function deleteCalonMahasiswa($id)
    {
        $sql = "DELETE FROM calon_mahasiswa WHERE id = :id";
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

    // Get list of all calon mahasiswa
    public function getCalonMahasiswaList()
    {
        $sql = 'SELECT * FROM calon_mahasiswa';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get data for combo (dropdown) options
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM calon_mahasiswa';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

?>
