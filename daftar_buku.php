<?php
    include "header.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Daftar Buku</title>
</head>
<body>
    <h2>Daftar Buku</h2>
    <div class="row">
        <?php 
        include "koneksi.php";
        $qry_buku=mysqli_query($conn,"SELECT * FROM buku");
        while($dt_buku=mysqli_fetch_array($qry_buku)){
            ?>
            <div class="col-md-3">
                <div class="card" >
                <img src="images/<?=$dt_buku['foto_buku']?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$dt_buku['nama_buku']?></h5>
                    <p class="card-text"><?=substr($dt_buku['deskripsi_buku'], 0,50)?></p>
                    <a href="tampil_pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>" class="btn btn-primary">Pinjam</a>
                </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <footer>
        <?php 
            include "footer.php";
        ?>
    </footer>
</body>
</html>