<?php
session_start();
include '../config.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    
    exit;
}

$prodi_kode = strtoupper($_POST['prodi_kode']);
$prodi_nama = strtoupper($_POST['prodi_nama']);
$prodi_jenjang = strtoupper($_POST['prodi_jenjang']);
$prodi_status = strtoupper($_POST['prodi_status']);


mysqli_query($config, "UPDATE tblprodi SET
        prodi_nama='$prodi_nama', prodi_jenjang='$prodi_jenjang',
        prodi_status='$prodi_status' WHERE prodi_kode='$prodi_kode'");

header('location:index.php');

?>