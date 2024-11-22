<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
</head>
<body>
    <h3>Tambah Siswa</h3>
    <form action="proses_tambah_siswa.php" method="post">
        Nama siswa :
        <input type="text" name="nama_siswa" value="" class="form-control">
        Tanggal Lahir :
        <input type="date" name="tanggal_lahir" value="" class="form-control">
        Gender :
        <select name="gender" class="form-control">
            <option value="">Pilih Gender</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        Alamat :
        <textarea name="alamat" class="form-control" rows="4"></textarea>
        Kelas :
        <select name="id_kelas" class="form-control">
            <option>Pilih Kelas</option>
            <?php
            include "koneksi.php";
            $qry_kelas = mysqli_query($conn, "SELECT * FROM kelas");    
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                echo '<option value="'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';
            }
            ?>
        </select>
        Username :
        <input type="text" name="username" value="" class="form-control">
        Password :
        <input type="password" name="password" value="" class="form-control">
        <input type="submit" name="simpan" value="Tambah Siswa" class="btn btn-primary" style="margin-top: 20px; width: 100%;">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>