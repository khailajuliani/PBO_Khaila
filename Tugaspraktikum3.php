<?php
class Pembeli
{
    private $kartuMember;
    private $totalBelanja;

    public function setKartuMember($status)
    {
        $this->kartuMember = $status;
    }

    public function setTotalBelanja($jumlah)
    {
        $this->totalBelanja = $jumlah;
    }

    public function getKartuMember()
    {
        return $this->kartuMember ? "ya" : "tidak";
    }

    public function getTotalBelanja()
    {
        return $this->totalBelanja;
    }

    public function getDiskon()
    {
        $diskon = 0;
        
        if ($this->kartuMember) {
            if ($this->totalBelanja >= 570000) {
                $diskon = 50000;
            } elseif ($this->totalBelanja >= 200000) {
                $diskon = 15000;
            } elseif ($this->totalBelanja >= 50000) {
                $diskon = 5000;
            }
        } else {
            if ($this->totalBelanja >= 120000) {
                $diskon = 5000;
            } else {
                $diskon = 0;
            }
        }
        return $diskon;
    }

    public function getBiayaDikeluarkan()
    {
        return $this->totalBelanja - $this->getDiskon();
    }
}

// Data pembeli dari tabel
$pembeliData = [
    ['kartuMember' => true, 'totalBelanja' => 200000],
    ['kartuMember' => true, 'totalBelanja' => 570000],
    ['kartuMember' => false, 'totalBelanja' => 120000],
    ['kartuMember' => false, 'totalBelanja' => 90000]
];

// Menampilkan output untuk setiap pembeli
foreach ($pembeliData as $index => $data) {
    $pembeli = new Pembeli();
    $pembeli->setKartuMember($data['kartuMember']);
    $pembeli->setTotalBelanja($data['totalBelanja']);

    echo "Pembeli " . ($index + 1) . "<br>";
    echo "Apakah ada kartu member: " . $pembeli->getKartuMember() . "<br>";
    echo "Total belanjaan: Rp " .($pembeli->getTotalBelanja()) . "<br>";
    echo "Biaya yang dikeluarkan: Rp " .($pembeli->getBiayaDikeluarkan() ) . "<br><br>";
}
?>
