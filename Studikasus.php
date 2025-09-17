<?php
// Class induk
class Employee {
    public $gajiPokok;

    public function __construct($gajiPokok) {
        $this->gajiPokok = $gajiPokok;
    }

    public function hitungGaji() {
        return $this->gajiPokok;
    }
}

// Programmer
class Programmer extends Employee {
    public $bonus;

    public function __construct($gajiPokok, $bonus) {
        parent::__construct($gajiPokok);
        $this->bonus = $bonus;
    }

    public function hitungGaji() {
        return $this->gajiPokok + $this->bonus;
    }
}

// Direktur
class Direktur extends Employee {
    public $tunjangan;

    public function __construct($gajiPokok, $tunjangan = 0) {
        parent::__construct($gajiPokok);
        $this->tunjangan = $tunjangan;
    }

    public function hitungGaji() {
        return $this->gajiPokok + $this->tunjangan;
    }

    // Overloading sederhana
    public function hitungGajiDenganBonus($bonus = 0) {
        return $this->hitungGaji() + $bonus;
    }
}


// Pegawai Mingguan
class PegawaiMingguan extends Employee {
    public $stok;
    public $terjual;
    public $hargaBarang;

    public function __construct($gajiPokok, $stok, $terjual, $hargaBarang) {
        parent::__construct($gajiPokok);
        $this->stok = $stok;
        $this->terjual = $terjual;
        $this->hargaBarang = $hargaBarang;
    }

    public function hitungGaji() {
        $persentase = ($this->terjual / $this->stok) * 100;
        $totalPenjualan = $this->terjual * $this->hargaBarang;

        if ($persentase > 70) {
            $bonus = 0.10 * $totalPenjualan;
        } 
        else {
            $bonus = 0.03 * $totalPenjualan; // jika ada bonus kecil
        }

        return $this->gajiPokok + $bonus;
    }
}

// --- Output ---
$programmer = new Programmer(4000000, 200000);
echo "Total Gaji Programmer: Rp " . number_format($programmer->hitungGaji(), 0, ',', '.') . "<br>";

$direktur = new Direktur(8000000, 5000000);
echo "Total Gaji Direktur: Rp " . number_format($direktur->hitungGaji(), 0, ',', '.') . "<br>";
echo "Total Gaji Direktur dengan bonus tambahan: Rp " . number_format($direktur->hitungGajiDenganBonus(1000000), 0, ',', '.') . "<br>";

$pegawaiMingguan = new PegawaiMingguan(500000, 100, 80, 50000); 
// gajiPokok=500rb, stok=100, terjual=80 (>70%), harga=50rb
echo "Total Gaji Pegawai Mingguan (Penjualan 80/100): Rp " . number_format($pegawaiMingguan->hitungGaji(), 0, ',', '.') . "<br>";

