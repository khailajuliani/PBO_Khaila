<?php

class Address
{
    public $street;
    public $city;
}

class Person
{
    public $name;
    public $address;
    
    public function __construct($name)
    {
        $this->name = $name;
        // Inisialisasi properti sebagai objek Address baru
        $this->address = new Address(); 
    }
    
    // Magic Method: __clone()
    public function __clone()
    {
        // Melakukan Deep Copy: 
        // Mengganti properti $address yang lama (merupakan referensi) 
        // dengan kloning yang baru (objek Address yang independen).
        $this->address = clone $this->address;
    }
}

$bob = new Person('Bob');
$bob->address->street = 'North 1st Street';
$bob->address->city = 'San Jose';

// Kloning objek $bob menjadi $alex
// Secara default, ini adalah Shallow Copy.
$alex = clone $bob;
$alex->name = 'Alex'; // Properti primitif akan diubah tanpa memengaruhi $bob

// Mengubah properti objek $alex->address
$alex->address->street = '1 Apple Park Way'; 
$alex->address->city = 'Cupertino';

// Tampilkan hasil (untuk memverifikasi bahwa $bob->address TIDAK berubah)
var_dump($bob);
var_dump($alex);

?>