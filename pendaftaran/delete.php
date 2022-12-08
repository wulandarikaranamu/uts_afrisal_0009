<?php
    session_start();
    include '../config.php';
    if (!isset($_SESSION["login"])) {
        header("Location: ../login.php");
        
        exit;
    }

    $pendaftaran_id = $_GET['pendaftaran_id'];

    $query = mysqli_query($config, "DELETE FROM tblpendaftaran 
                                    WHERE pendaftaran_id='$pendaftaran_id'");
    
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