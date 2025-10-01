<?php

// Definisi Class Employee (Enkapsulasi)
class Employee
{
    // Properti dienkapsulasi dengan hak akses private
    private $first_name;
    private $last_name;
    private $age;

    // Method konstruktor untuk inisialisasi properti saat objek dibuat
    public function __construct($first_name, $last_name, $age)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
    }

    // Method publik untuk mendapatkan nama depan
    public function getFirstName()
    {
        return $this->first_name;
    }

    // Method publik untuk mendapatkan nama belakang
    public function getLastName()
    {
        return $this->last_name;
    }

    // Method publik untuk mendapatkan usia
    public function getAge()
    {
        return $this->age;
    }
}

// Eksekusi (Instansiasi Objek dan Pemanggilan Method)

// Membuat objek pertama
$objEmployeeOne = new Employee('Bob', 'Smith', 30);

// Menampilkan data objek pertama
echo $objEmployeeOne->getFirstName(); // prints 'Bob'
echo $objEmployeeOne->getLastName(); // prints 'Smith'
echo $objEmployeeOne->getAge(); // prints '30'

// Membuat objek kedua
$objEmployeeTwo = new Employee('John', 'Smith', 34);

// Menampilkan data objek kedua
echo $objEmployeeTwo->getFirstName(); // prints 'John'
echo $objEmployeeTwo->getLastName(); // prints 'Smith'
echo $objEmployeeTwo->getAge(); // prints '34'

?>