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
        <div class="card mt-5">
            <div class="card-header">
                Tambah Pendaftar
            </div>
            <div class="card-body">
            <form action="store.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" class="form-control"  name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Foto</label>
                    <input class="form-control" type="file" name="gambar" required >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <textarea class="form-control"  rows="3" name="alamat" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="radio" value="Laki - Laki" name="jenkel" checked >
                        <label class="form-check-label" for="">
                            Laki - Laki
                        </label>
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="radio" value="Perempuan" name="jenkel" >
                        <label class="form-check-label" for="">
                            Perempuan
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tempat, Tanggal Lahir</label>
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="text" name="tempat" required >
                        </div>
                        <div class="col-6">
                            <input class="form-control" type="date" name="tanggal" required >
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">UKM yang diminati</label>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="radio" value="Olahraga" name="ukm" checked >
                        <label class="form-check-label" for="">
                            Olahraga
                        </label>
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="radio" value="Keilmuan" name="ukm" >
                        <label class="form-check-label" for="">
                            Keilmuan
                        </label>
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="radio" value="Musik dan Seni" name="ukm" >
                        <label class="form-check-label" for="">
                            Musik dan Seni
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Program Studi</label>
                    <select class="form-select" name="program" aria-label="Default select example">
                    <?php 
                        include '../config.php';
                        $query = mysqli_query($config, "SELECT * FROM tblprodi");
                        while ($d = mysqli_fetch_array($query)) {
                    ?>
                            <option value="<?= $d['prodi_kode'] ;?>"><?= $d['prodi_nama'] ;?></option>
                    <?php 
                        }
                    ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">IPK</label>
                    <input type="text" class="form-control"  name="ipk" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Biaya Pendaftaran</label>
                    <input type="number" class="form-control" value="50000"  name="biaya" readonly required>
                </div>
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2 mx-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
            crossorigin="anonymous">
    </script>
  </body>
</html>





