<?php
include_once('../db/database.php');
$db = new Database();
$sql = "select * from calon_mahasiswa";
$sql = 'SELECT * FROM calon_mahasiswa';
$result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($result);
?>