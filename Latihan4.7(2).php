<?php 

class Perulangan { 

    public function loop1() { 

        for ($baris = 1; $baris <= 6; $baris++) { 

            for ($kolom = 1; $kolom <= 6; $kolom++) { 

                echo "*"; 

            } 

            echo "<br />"; 

        } 

    } 
    public function loop2() { 

        for ($baris = 1; $baris <= 6; $baris++) { 

            for ($kolom = 1; $kolom <= 6; $kolom++) { 

                echo "* &nbsp;"; 

            } 

            echo "<br />"; 

        } 

    } 

} 

$ObjekPerulangan = new Perulangan(); 

echo "Jenis Perulangan : <br />"; 

echo $ObjekPerulangan->loop1() . "<br />"; 

echo $ObjekPerulangan->loop2() . "<br />"; 

?> 