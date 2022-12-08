<?php
session_start();
include '../config.php';
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    
    exit;
}

$pendaftaran_id = $_POST['pendaftaran_id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenkel = $_POST['jenkel'];
$tempat = $_POST['tempat'];
$tanggal = $_POST['tanggal'];
$program = $_POST['program'];
$ukm = $_POST['ukm'];
$ipk = $_POST['ipk'];
$biaya = 50000;
$diskon = "o";

if($ipk > 3.75) {
    $diskon = "Besar Diskon 30%";
    $biaya = $biaya - ($biaya*0.3);
} elseif($ipk > 3.5) {
    $diskon = "Besar Diskon 20%";
    $biaya = $biaya - ($biaya*0.2);

} else {
    $diskon = "Besar Diskon 10%";
    $biaya = $biaya - ($biaya*0.1) ;
    
}

// cek apakah user pilih gambar baru atau tidak
if( $_FILES['gambar']['error'] === 4 ) {
    mysqli_query($config, "UPDATE tblpendaftaran SET pendaftaran_nama='$nama', 
                    pendaftaran_alamat='$alamat',pendaftaran_gender='$jenkel', 
                    pendaftaran_tempatlahir='$tempat', pendaftaran_tanggallahir='$tanggal', 
                    prodi_kode='$program',pendaftaran_ukm='$ukm', pendaftaran_ipk='$ipk', 
                    pendaftaran_biaya='$biaya' WHERE pendaftaran_id='$pendaftaran_id'");   
    echo "
        <script>
            alert('Update Berhasil');
            window.location.replace('index.php');
        </script>
    ";

} else {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek gambar atau bukan yang diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "
            <script>
                alert('yang anda upload bukan gambar');
                history.back();
            </script>
            ";
        return false;
    }

    // cek ukuran file
    if( $ukuranFile > 1000000){
        echo "
            <script>
                alert('ukuran gambar terlalu besar');
                history.back();
            </script>
            ";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    
    move_uploaded_file($tmpName, '../uploads/' . $namaFileBaru);

    $gambar = $namaFileBaru;
    mysqli_query($config, "UPDATE tblpendaftaran SET pendaftaran_nama='$nama', 
                        pendaftaran_gambar='$gambar', pendaftaran_alamat='$alamat',
                        pendaftaran_gender='$jenkel', pendaftaran_tempatlahir='$tempat',
                        pendaftaran_tanggallahir='$tanggal', prodi_kode='$program',
                        pendaftaran_ukm='$ukm', pendaftaran_ipk='$ipk', 
                        pendaftaran_biaya='$biaya' WHERE pendaftaran_id='$pendaftaran_id'");
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME</title>
    <link   href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
            crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="../uploads/default.jpg" alt="Logo" width="50" height="50" 
                            class="d-inline-block align-text-top rounded-circle">
                            <?= $_SESSION["username"]; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse "  id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <b>Pendaftaran</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../jurusan/index.php"><b>Jurusan</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php"><b>Logout</b></a>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                    Data Pendaftar
            </div>
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>: <?= $nama; ?></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>: <?= $gambar; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $alamat;?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?= $jenkel;?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>: <?= $tempat;?>, <?= $tanggal;?></td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>: <?= $program;?></td>
                        </tr>
                        <tr>
                            <td>UKM yang Diminati</td>
                            <td>: <?= $ukm;?></td>
                        </tr>
                        <tr>
                            <td>IPK</td>
                            <td>: <b><?= $ipk;?></b></td>
                        </tr>

                        <tr>
                            <td>Diskon</td>
                            <td>: <b><?= $diskon;?></b></td>
                        </tr>
                        <tr>
                            <td>Biaya Pendaftaran</td>
                            <td>: <b>Rp. <?= number_format($biaya);?></b></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php" class="btn btn-secondary mt-2">Lihat Daftar</a>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
            crossorigin="anonymous">
    </script>
  </body>
</html>