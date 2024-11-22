<?php
include "header.php";
?>

<h2>Daftar Buku di Keranjang</h2>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th><th>Nama Buku</th><th>Jumlah</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Cek apakah 'cart' ada di dalam session dan merupakan array
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0): 
            foreach($_SESSION['cart'] as $key_produk => $val_produk):
        ?>
                <tr>
                    <td><?=$key_produk + 1?></td>
                    <td><?=$val_produk['nama_buku']?></td>
                    <td><?=$val_produk['qty']?></td>
                    <td><a href="hapus_cart.php?id=<?=$key_produk?>" class="btn btn-danger"><strong>X</strong></a></td>
                </tr>
        <?php 
            endforeach;
        else: 
        ?>
            <tr>
                <td colspan="4">Keranjang kosong</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="checkout.php" class="btn btn-primary">Check Out</a>

<?php 
include "footer.php";
?>
