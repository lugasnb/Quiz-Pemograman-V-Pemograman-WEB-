<?php
include_once('../db/database.php');
$db = new Database();
$sql = "select * from pasien";
$sql = 'SELECT * FROM pasien';
$result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($result);
?>