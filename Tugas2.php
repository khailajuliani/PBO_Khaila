<?php
// Program Penghitung Besaran Angsuran Hutang
$pinjaman = 1000000;
$bunga = 10; // persen
$lama_angsuran = 5; // bulan
$telat_hari = 40;
$persen_denda = 0.15 / 100; // 0.15% dalam bentuk desimal

// Hitung total pinjaman (pokok + bunga)
$total_pinjaman = $pinjaman + ($pinjaman * $bunga / 100);

// Hitung besaran angsuran per bulan
$angsuran = $total_pinjaman / $lama_angsuran;

// Hitung denda keterlambatan
$denda = $angsuran * $persen_denda * $telat_hari;

// Hitung total pembayaran yang harus dilakukan
$total_pembayaran = $angsuran + $denda;

// Tampilan Hasil
echo "Besaran Pinjaman : Rp. " . number_format($pinjaman, 0, ) . "<br>";
echo "Masukkan besar bunga (%) : " . $bunga . "<br>";
echo "Total Pinjaman : Rp. " . number_format($total_pinjaman, 0, ) . "<br>";
echo "Lama angsuran (bulan) : " . $lama_angsuran . "<br>";
echo "Besaran angsuran : Rp. " . number_format($angsuran, 0, ) . "<br><br>";

echo "Keterlambatan Angsuran (Hari): " . $telat_hari . "<br>";
echo "Denda Keterlambatan : " . number_format($denda, 0, ) . "<br>";
echo "Besaran Pembayaran : " . number_format($total_pembayaran, 0, ) . "<br>";

?>