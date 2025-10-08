<?php

// Definisikan Custom Exception Class
class customException extends Exception {
    
    // Metode kustom untuk menghasilkan pesan kesalahan yang lebih rinci
    public function errorMessage() {
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                  . ': ' . $this->getMessage() . '<br/><b>Is not a valid E-Mail address!</b>';
        
        return $errorMsg;
    }
}

// Data yang akan diuji
$email = "seseorang@example.com"; 

// Blok try utama
try {
    // 1. Cek validitas format email secara umum (Menggunakan CustomException)
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        // Melempar CustomException jika format TIDAK valid
        throw new customException($email);
    }
    
    // 2. Cek keberadaan substring "@example" (Menggunakan Exception bawaan)
    if (strpos($email, "example") === FALSE) {
        // Melempar Exception standar PHP jika substring TIDAK ditemukan
        throw new Exception("'$email' is an example e-mail");
    }

    // Jika semua cek lolos
    echo 'Email: ' . $email . ' is valid';

} 
// Blok catch 1: Menangkap CustomException
catch (customException $e) {
    // Menampilkan pesan kustom dari errorMessage()
    echo $e->errorMessage(); 
    
} 
// Blok catch 2: Menangkap Exception standar PHP
catch (Exception $e) {
    // Menampilkan pesan standar dari getMessage()
    echo $e->getMessage();
}

?>