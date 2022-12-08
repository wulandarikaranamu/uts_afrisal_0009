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
                            <a class="nav-link active" aria-current="page" href="../jurusan/">
                                <b>Pendaftaran</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><b>Jurusan</b></a>
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
                Edit Jurusan
            </div>
            <div class="card-body"> 
            <?php 
                include '../config.php';
                $no = 1;
                $prodi_kode = $_GET['prodi_kode'];
                $query = mysqli_query($config, "SELECT * FROM tblprodi WHERE prodi_kode='$prodi_kode'");
                while ($d = mysqli_fetch_array($query)) {
            ?>
            <form action="update.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Kode Prodi </label>
                    <input type="text" class="form-control" value="<?= $d['prodi_kode']; ?>" 
                            name="prodi_kode" maxlength="2" readonly required> 
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nama Prodi</label>
                    <input type="text" class="form-control" value="<?= $d['prodi_nama']; ?>"  
                            name="prodi_nama" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jenjang Prodi</label>
                    <input type="text" class="form-control" value="<?= $d['prodi_jenjang']; ?>"  
                            name="prodi_jenjang" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status Prodi</label>
                    <input type="text" class="form-control" value="<?= $d['prodi_status']; ?>"  
                            name="prodi_status" required>
                </div>
                <div class="mb-3">
                    <div class="d-grid gap-2 mx-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </div>
            </form>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
            crossorigin="anonymous">
    </script>
  </body>
</html>





