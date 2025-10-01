<?php
// ====================================================
// BAGIAN 1: DEFINISI CLASS (Encapsulation dan Inheritance)
// ====================================================

// CLASS INDUK: TabunganDasar
class TabunganDasar {
    // PROTECTED: Saldo dapat diwariskan/diakses oleh class anak. (Encapsulation)
    protected int $saldo;

    // CONSTRUCTOR
    public function __construct(int $saldoAwal) {
        $this->saldo = $saldoAwal;
    }

    // PUBLIC: Untuk menampilkan saldo
    public function lihatSaldo(): int {
        return $this->saldo;
    }

    protected function tambahSaldo(int $jumlah): void {
        $this->saldo += $jumlah;
    }

    protected function kurangSaldo(int $jumlah): bool {
        if ($this->saldo >= $jumlah) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }
}

// CLASS ANAK: Siswa
class Siswa extends TabunganDasar {
    private string $nama;
    public int $id;

    public function __construct(int $id, string $nama, int $saldoAwal) {
        parent::__construct($saldoAwal); 
        $this->id = $id;
        $this->nama = $nama;
    }

    public function getNama(): string {
        return $this->nama;
    }
    
    // Logika Setor (OUTPUT TIDAK ADA SALDO AKHIR)
    public function setorTunai(int $jumlah): string {
        $this->tambahSaldo($jumlah);
        return "Setor berhasil."; // Pesan singkat
    }

    // Logika Tarik (OUTPUT TIDAK ADA SALDO AKHIR, mengandung Percabangan)
    public function tarikTunai(int $jumlah): string {
        if ($this->kurangSaldo($jumlah)) {
            return "Tarik berhasil."; // Pesan singkat
        } else {
            // Tetap berikan informasi saldo jika gagal
            return "Gagal. Saldo tidak cukup (Rp " . number_format($this->saldo, 0, ',', '.') . ").";
        }
    }
}

// ----------------------------------------------------
// INISIALISASI DATA SISWA (ARRAY)
// ----------------------------------------------------

$daftarSiswa = [
    1 => new Siswa(1, "Budi", 50000),   
    2 => new Siswa(2, "Ani", 75000),    
    3 => new Siswa(3, "Caca", 100000)   
];

// ====================================================
// BAGIAN 2: PROGRAM CLI UTAMA (Interaktif Sederhana)
// ====================================================

function tampilkanSaldoAwal($siswaArray) {
    echo "\n=== SALDO AWAL SISWA ===\n";
    foreach ($siswaArray as $siswa) {
        echo "ID {$siswa->id}: " . str_pad($siswa->getNama(), 5) . " | Saldo: Rp " . number_format($siswa->lihatSaldo()) . "\n";
    }
    echo "========================\n";
}

// I/O CLI: Menggunakan fopen dan fgets
$handle = fopen("php://stdin", "r");

echo "--- PROGRAM TABUNGAN SEKOLAH ---\n";

tampilkanSaldoAwal($daftarSiswa);

// Perulangan utama program
while (true) {
    echo "\n[Pilih Aksi]\n";
    echo "1. Setor Tunai\n";
    echo "2. Tarik Tunai\n";
    echo "3. Lihat Saldo\n";
    echo "4. Keluar\n";
    echo "Pilihan Anda (1-4): ";
    
    $pilihan = trim(fgets($handle));

    // Percabangan utama
    if ($pilihan == '4') { 
        echo "\nProgram selesai. Sampai jumpa!\n";
        break;
    } 
    
    if (!in_array($pilihan, ['1', '2', '3'])) {
        echo "\n[ERROR] Pilihan tidak valid.\n";
        continue;
    }

    echo "Pilih Siswa (1, 2, atau 3): ";
    $idSiswa = (int)trim(fgets($handle));
    
    if (!isset($daftarSiswa[$idSiswa])) {
        echo "\n[ERROR] ID Siswa tidak ditemukan.\n";
        continue;
    }

    $siswaAktif = $daftarSiswa[$idSiswa]; 

    if ($pilihan == '3') {
        // LIHAT SALDO (Satu-satunya tempat saldo ditampilkan)
        echo "\n--- Saldo " . $siswaAktif->getNama() . " ---\n";
        echo "Saldo saat ini: Rp " . number_format($siswaAktif->lihatSaldo(), 0, ',', '.') . "\n";
    } else {
        // SETOR ATAU TARIK
        echo "Masukkan Jumlah Uang: Rp ";
        $jumlah = (int)trim(fgets($handle));

        if ($jumlah <= 0) {
            echo "\n[ERROR] Jumlah harus lebih dari nol.\n";
            continue;
        }
        if ($pilihan == '1') {
            echo $siswaAktif->setorTunai($jumlah) . "\n";
        } else { 
            echo $siswaAktif->tarikTunai($jumlah) . "\n";
        }
    }
    
    echo "Tekan ENTER untuk melanjutkan...";
    trim(fgets($handle));
}

fclose($handle);
?>