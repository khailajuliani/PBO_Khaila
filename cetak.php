<?php
include('koneksi.php');
$db = new database();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Barang</title>
    <style>
        /* CSS untuk cetak, seperti pengaturan tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body onload="window.print()">
    <center><h1>LAPORAN DATA BARANG</h1></center>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($db->tampil_data() as $x){ // Asumsi memanggil fungsi tampil_data()
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $x['kd_barang']; ?></td>
                <td><?php echo $x['nama_barang']; ?></td>
                <td><?php echo $x['stok']; ?></td>
                <td>Rp <?php echo number_format($x['harga_beli'], 0, ',', '.'); ?></td>
                <td>Rp <?php echo number_format($x['harga_jual'], 0, ',', '.'); ?></td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</body>
</html>