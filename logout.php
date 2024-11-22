<?php
    session_start();
    session_destroy();

    // cek apakah sudah login atau belum
    if(!isset($_SESSION['status_login'])){
        echo "  <script> 
                    alert('Login Terlebih Dahulu')
                    window.location.href = 'login.php'
                </script>";
    }else{
        echo "  <script>
                    alert('Log out Berhasil');
                    window.location.href = 'login.php';
                </script>";
    }
?>