<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Histori Peminjaman Buku</title>
</head>
<body>
    <?php
        include "header.php";
    ?>
    <h2>Histori Peminjaman Buku</h2>
    <table class="table table-hover table-striped">
        <thead>
            <th>No</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal harus Kembali</th>
            <th>Nama Buku</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
                include "koneksi.php";
                $qry_histori = mysqli_query($conn, "SELECT * FROM peminjaman_buku ORDER BY id_peminjaman_buku DESC");
                $no = 0;
                while($dt_histori = mysqli_fetch_array($qry_histori)){
                    $no++;
                    // Menampilkan buku yang dipinjam
                    $buku_dipinjam = "<ol>";
                    $qry_buku = mysqli_query($conn, "SELECT * FROM detail_peminjaman_buku JOIN buku ON buku.id_buku = detail_peminjaman_buku.id_buku WHERE id_peminjaman_buku = '".$dt_histori['id_peminjaman_buku']."'");
                    while($dt_buku = mysqli_fetch_array($qry_buku)){
                        $buku_dipinjam.="<li>".$dt_buku['nama_buku'].".</li>";
                    }
                    $buku_dipinjam.="</ol>";
                    $status_kembali = "<label class='alert alert-danger'>Belum Kembali</label>";
                    $button_kembali = "<a href='kembali.php?id=".$dt_histori['id_peminjaman_buku']."' class='btn btn-warning' onclick='return confirm(\"Apakah kamu yakin?\")'>Kembalikan</a>";
                    // Menampilkan status sudah kembali atau belum
                    $qry_cek_kembali =  mysqli_query($conn, "SELECT * FROM pengembalian_buku WHERE id_peminjaman_buku = '".$dt_histori['id_peminjaman_buku']."'");
                    if(mysqli_num_rows($qry_cek_kembali) > 0){
                        $dt_kembali = mysqli_fetch_array($qry_cek_kembali);
                        $denda = "denda Rp. ".$dt_kembali['denda'];
                        $status_kembali = "<label class='alert alert-success'>Sudah Kembali <br>".$denda."</label>";
                        $button_kembali = "<a href='kembali.php?id=".$dt_histori['id_peminjaman_buku']."' class='btn btn-warning' onclick='return confirm(\"Apakah kamu yakin?\")'>Kembalikan</a>";
                    }
                ?>
                    <tr>
                        <td><?=$no?></td><td><?=$dt_histori['tanggal_peminjaman']?></td><td><?=$dt_histori['tanggal_kembali']?></td><td><?=$buku_dipinjam?></td><td><?=$status_kembali?></td><td><?=$button_kembali?></td>
                    </tr>
                <?php
                }
                ?>
        </tbody>
    </table>
</body>
</html> 