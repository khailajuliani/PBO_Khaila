<?php
// Class induk
class Kendaraan {
    public $merek;
    public $harga;

    public function __construct($merek, $harga) {
        $this->merek = $merek;
        $this->harga = $harga;
    }
}

// Class turunan
class Pesawat extends Kendaraan {
    private $tinggiMaks;
    private $kecepatanMaks;

    public function setTinggiMaks($tinggi) {
        $this->tinggiMaks = $tinggi;
    }

    public function setKecepatanMaks($kecepatan) {
        $this->kecepatanMaks = $kecepatan;
    }

    public function bacaTinggiMaks() {
        return $this->tinggiMaks;
    }

    public function bacaKecepatanMaks() {
        return $this->kecepatanMaks;
    }

    public function biayaOperasional() {
        $tinggi = $this->tinggiMaks;
        $kecepatan = $this->kecepatanMaks;
        $harga = $this->harga * 1000000; // ubah juta jadi rupiah

        if ($tinggi > 5000 && $kecepatan > 800) {
            $biaya = 0.30 * $harga;
        } elseif ($tinggi >= 3000 && $tinggi <= 5000 && $kecepatan >= 500 && $kecepatan <= 800) {
            $biaya = 0.20 * $harga;
        } elseif ($tinggi < 3000 && $kecepatan < 500) {
            $biaya = 0.10 * $harga;
        } else {
            $biaya = 0.05 * $harga;
        }

        return $biaya;
    }

    public function infoPesawat() {
        $biaya = $this->biayaOperasional();
        echo "Biaya operasional pesawat '{$this->merek}' dengan harga Rp " . 
             number_format($this->harga*1000000,0,',','.') . 
             " yang memiliki tinggi maksimum {$this->tinggiMaks} feet dan kecepatan maksimum {$this->kecepatanMaks} km/jam adalah Rp " . 
             number_format($biaya,0,',','.') . "<br>";
    }
}

// Data pesawat
$boeing737 = new Pesawat("Boeing 737", 2000);
$boeing737->setTinggiMaks(7500);
$boeing737->setKecepatanMaks(650);
$boeing737->infoPesawat();

$boeing747 = new Pesawat("Boeing 747", 3500);
$boeing747->setTinggiMaks(5800);
$boeing747->setKecepatanMaks(750);
$boeing747->infoPesawat();

$cassa = new Pesawat("Cassa", 750);
$cassa->setTinggiMaks(3500);
$cassa->setKecepatanMaks(500);
$cassa->infoPesawat();
?>