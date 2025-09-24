<?php
class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;
    
    public $gajiPokok = [
        "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
        "IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
        "IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
        "IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000,
    ];

    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
        echo "construct : Objek Karyawan ({$this->nama}) berhasil dibuat.\n";
    }

    public function getGajiPokok() {
        return $this->gajiPokok[$this->golongan] ?? 0;
    }

    public function getTotalGaji() {
        $gajiPokok = $this->getGajiPokok();
        $gajiLembur = $this->jamLembur * 15000;
        return $gajiPokok + $gajiLembur;
    }

    public function __destruct() {
        echo "destruct : Objek Karyawan ({$this->nama}) dihapus.\n";
    }
}

// Array untuk menyimpan objek-objek karyawan
$daftarKaryawan = [];

// Meminta jumlah karyawan dari pengguna
echo "Masukkan jumlah karyawan yang akan diinput: ";
$jumlahKaryawan = (int)trim(fgets(STDIN));
echo "\n";

// Loop untuk menerima input dari pengguna sebanyak jumlah karyawan
for ($i = 0; $i < $jumlahKaryawan; $i++) {
    echo "--- Input Data Karyawan ke-" . ($i + 1) . " ---\n";
    
    echo "Nama Karyawan: ";
    $nama = trim(fgets(STDIN));
    
    echo "Golongan: ";
    $golongan = trim(fgets(STDIN));
    
    echo "Total Jam Lembur: ";
    $jamLembur = (int)trim(fgets(STDIN));
    echo "\n";

    // Membuat objek baru dan menyimpannya ke dalam array
    $daftarKaryawan[] = new Karyawan($nama, $golongan, $jamLembur);
}

echo "Data berhasil diinput. Menampilkan hasil...\n\n";

// Menampilkan header tabel di PHP CLI
echo str_pad("Nama Karyawan", 18) . str_pad("Golongan", 12) . str_pad("Total Jam Lembur", 20) . str_pad("Total Gaji", 15) . "\n";
echo str_repeat("-", 65) . "\n";

// Loop untuk menampilkan data dari setiap objek
foreach ($daftarKaryawan as $karyawan) {
    echo str_pad($karyawan->nama, 18);
    echo str_pad($karyawan->golongan, 12);
    echo str_pad($karyawan->jamLembur, 20);
    echo str_pad("Rp " . number_format($karyawan->getTotalGaji(), 4, ',', '.'), 15);
    echo "\n";
}

echo "\n--- Program Selesai ---\n";

?>