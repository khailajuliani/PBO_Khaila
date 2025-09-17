<?php

// Bagian 1: Kelas Induk (Superclass)
// Kelas 'manusia' berfungsi sebagai cetak biru dasar
class manusia {
    // Properti untuk menyimpan nama
    public $Nama_saya;

    // Metode untuk menetapkan nilai ke properti '$Nama_saya'
    function berinama($saya){
        $this->Nama_saya = $saya;
    }
}

// Bagian 2: Kelas Anak (Subclass)
// Kelas 'teman' mewarisi properti dan metode dari kelas 'manusia'
class teman extends manusia {
    // Properti unik untuk kelas 'teman'
    public $Nama_teman;

    // Metode unik untuk menetapkan nama teman
    function berinamateman($teman){
        $this->Nama_teman = $teman;
    }
}

// Bagian 3: Instansiasi dan Penggunaan Objek
// Membuat objek baru dari kelas 'teman'
$objectteman = new teman;

// Menggunakan metode yang diwarisi dari kelas 'manusia'
$objectteman->berinama("Dika");

// Menggunakan metode dari kelas 'teman' itu sendiri
$objectteman->berinamateman("Andra");

// Menampilkan hasil
// Properti '$Nama_saya' diakses meskipun diwarisi dari kelas 'manusia'
echo "Nama Saya: " . $objectteman->Nama_saya . "<br/>";

// Properti '$Nama_teman' diakses dari kelas 'teman'
echo "Nama Teman Saya: " . $objectteman->Nama_teman;

?>