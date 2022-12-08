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

$query = mysqli_query($config, "SELECT prodi_kode FROM tblprodi WHERE prodi_kode ='$prodi_kode'");

if (mysqli_fetch_assoc($query)) {
    echo "<script>
        alert('Prodi Kode Sudah Ada!');
        window.location.replace('create.php');
        </script>";
    return false;
} 

mysqli_query($config, "INSERT INTO tblprodi VALUES(
        '$prodi_kode','$prodi_nama','$prodi_jenjang','$prodi_status')");

header('location:index.php');

?>