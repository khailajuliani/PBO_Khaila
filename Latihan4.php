<?php
class BangunRuang {
    private $jenis;
    private $sisi;
    private $jari;
    private $tinggi;

    // Setter
    public function setJenis($jenis) { $this->jenis = $jenis; }
    public function setSisi($sisi) { $this->sisi = $sisi; }
    public function setJari($jari) { $this->jari = $jari; }
    public function setTinggi($tinggi) { $this->tinggi = $tinggi; }

    // Getter
    public function getJenis() { return $this->jenis; }
    public function getSisi() { return $this->sisi; }
    public function getJari() { return $this->jari; }
    public function getTinggi() { return $this->tinggi; }

    // Hitung volume
    public function getVolume() {
        switch($this->jenis) {
            case "Bola":
                return (4/3) * pi() * pow($this->jari, 3);
            case "Kerucut":
                return (1/3) * pi() * pow($this->jari, 2) * $this->tinggi;
            case "Limas Segi Empat":
                return (1/3) * pow($this->sisi, 2) * $this->tinggi;
            case "Kubus":
                return pow($this->sisi, 3);
            case "Tabung":
                return pi() * pow($this->jari, 2) * $this->tinggi;
            default:
                return 0;
        }
    }
}

// Data array associative (tanpa buat object dulu)
$dataBangunRuang = [
    ["jenis" => "Bola", "sisi" => 0, "jari" => 7, "tinggi" => 0],
    ["jenis" => "Kerucut", "sisi" => 0, "jari" => 14, "tinggi" => 10],
    ["jenis" => "Limas Segi Empat", "sisi" => 8, "jari" => 0, "tinggi" => 24],
    ["jenis" => "Kubus", "sisi" => 30, "jari" => 0, "tinggi" => 0],
    ["jenis" => "Tabung", "sisi" => 0, "jari" => 7, "tinggi" => 10],
];

// Cetak tabel (langsung dalam satu foreach)
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr bgcolor='blue' style='color:white;'>
        <th>Jenis Bangun Ruang</th>
        <th>Sisi</th>
        <th>Jari-jari</th>
        <th>Tinggi</th>
        <th>Volume</th>
      </tr>";

foreach ($dataBangunRuang as $data) {
    $obj = new BangunRuang();
    $obj->setJenis($data["jenis"]);
    $obj->setSisi($data["sisi"]);
    $obj->setJari($data["jari"]);
    $obj->setTinggi($data["tinggi"]);

    echo "<tr>
            <td>".$obj->getJenis()."</td>
            <td>".$obj->getSisi()."</td>
            <td>".$obj->getJari()."</td>
            <td>".$obj->getTinggi()."</td>
            <td>".round($obj->getVolume(), 6)."</td>
          </tr>";
}

echo "</table>";
?>