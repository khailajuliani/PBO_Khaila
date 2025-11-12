<?php
include('koneksi.php');
$db = new database();

// 1. Ambil nama_barang dari URL (yang dikirim dari proses_barang.php)
$nama_barang = isset($_GET['nama_barang']) ? $_GET['nama_barang'] : '';

// 2. Asumsi Anda telah menambahkan fungsi untuk mencari data berdasarkan nama di koneksi.php
// Jika Anda menggunakan fungsi cari_data() yang sudah ada:
$data_barang = $db->cari_data($nama_barang);

// 3. Asumsi kita hanya peduli pada data pertama yang ditemukan (jika ada)
$x = !empty($data_barang) ? $data_barang[0] : null;

// Cek jika data ditemukan
if ($x === null) {
    die("Data barang tidak ditemukan untuk dicetak.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Barang Satuan</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { text-align: center; margin-bottom: 30px; }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        .judul-cetak {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="judul-cetak">
        <h1>LAPORAN DATA BARANG SATUAN</h1>
        <h2><?php echo strtoupper($x['nama_barang']); ?></h2>
    </div>
    
    <table>
        <tr>
            <th width="30%">Kode Barang</th>
            <td><?php echo $x['kd_barang']; ?></td>
        </tr>
        <tr>
            <th>Nama Barang</th>
            <td><?php echo $x['nama_barang']; ?></td>
        </tr>
        <tr>
            <th>Stok</th>
            <td><?php echo $x['stok']; ?> unit</td>
        </tr>
        <tr>
            <th>Harga Beli</th>
            <td>Rp <?php echo number_format($x['harga_beli'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <th>Harga Jual</th>
            <td>Rp <?php echo number_format($x['harga_jual'], 0, ',', '.'); ?></td>
        </tr>
        <?php if (!empty($x['gambar_produk'])): ?>
        <tr>
            <th>Gambar Produk</th>
            <td><img src="gambar/<?php echo $x['gambar_produk']; ?>" style="width: 150px; height: auto;"></td>
        </tr>
        <?php endif; ?>
    </table>
</body>
</html>