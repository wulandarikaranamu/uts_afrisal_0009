<?php
    session_start();
    include '../config.php';
    if (!isset($_SESSION["login"])) {
        header("Location: ../login.php");
        exit;
    }

    $prodi_kode = $_GET['prodi_kode'];

    $query = mysqli_query($config, "DELETE FROM tblprodi
                                    WHERE prodi_kode='$prodi_kode'");
    
    if($query) {
        echo "
        <script>
                alert('Hapus Data Berhasil');
                history.back();
        </script>
        ";
    } else {
        echo "
        <script>
                alert('Hapus Data Gagal');
                history.back();
        </script>
        ";
    }
?>