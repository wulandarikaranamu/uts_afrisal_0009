<?php
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: ../login.php");
        
        exit;
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
    
    <h1 class="my-3">Kelola Pendaftaran</h1>
    <a href="daftar.php" class="btn btn-success my-3">+ Tambah</a>
    <br>
    <table class="table table-hover table-bordered table-responsive">
        <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Tempat</th>
            <th>Tanggal</th>
            <th>Prodi</th>
            <th>UKM</th>
            <th>IPK</th>
            <th>BIAYA</th>
            <th>AKSI</th>
        </tr>
        </thead>
        
        <?php 
            include '../config.php';
            $no = 1;
            $query = mysqli_query($config, "SELECT * FROM tblpendaftaran");
            while ($d = mysqli_fetch_array($query)) {

            // if ($d['prodi_kode'] == )
        ?>
            <tr>
                <td><?= $no++;?></td>
                <td>
                    <img src="../uploads/<?= $d['pendaftaran_gambar']; ?>" 
                            class="img-fluid" 
                            width="70px" alt="" 
                            srcset="">
                </td>
                <td><?= $d['pendaftaran_nama']; ?></td>
                <td><?= $d['pendaftaran_alamat']; ?></td>
                <td><?= $d['pendaftaran_gender']; ?></td>
                <td><?= $d['pendaftaran_tempatlahir']; ?></td>
                <td><?= $d['pendaftaran_tanggallahir']; ?></td>
                <td><?= $d['prodi_kode']; ?></td>
                <td><?= $d['pendaftaran_ukm']; ?></td>
                <td><?= $d['pendaftaran_ipk']; ?></td>
                <td><?= $d['pendaftaran_biaya']; ?></td>
                <td>
                    <a href="edit.php?pendaftaran_id=<?= $d['pendaftaran_id'];?>" class="btn btn-primary">Edit</a>  
                    <a href="delete.php?pendaftaran_id=<?= $d['pendaftaran_id'];?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php 
            }
        ?>
    
    </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
            crossorigin="anonymous">
    </script>
  </body>
</html>



