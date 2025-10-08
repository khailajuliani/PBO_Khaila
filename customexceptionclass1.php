<?php

// 1. Definisikan Kelas Pengecualian Kustom
// Kelas ini mewarisi (extends) semua properti dan metode dari kelas dasar Exception PHP.
class CustomException extends Exception {
    
    /**
     * Metode kustom untuk menghasilkan pesan kesalahan yang lebih rinci.
     * Menggunakan metode bawaan Exception seperti getLine(), getFile(), dan getMessage().
     */
    public function errorMessage() {
        // Pesan kesalahan yang formatnya disesuaikan
        $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                  . ': ' . $this->getMessage() . '<br/><b>Is not a valid E-Mail address!</b>';
        
        return $errorMsg;
    }
}

// 2. Data yang akan diuji
$email = "seseorang@example..com"; // Email sengaja dibuat TIDAK valid (perhatikan dua titik)

// 3. Blok try-catch untuk menangani pengecualian
try {
    // Memeriksa validitas email menggunakan fungsi bawaan PHP
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        // Jika tidak valid, lempar (throw) CustomException.
        // Pesan yang dilewatkan di sini ($email) akan menjadi hasil dari $this->getMessage()
        throw new CustomException($email);
    }
    
    // Bagian ini hanya dieksekusi jika email valid.
    echo "Email valid: " . $email;

} 
// 4. Tangkap (catch) CustomException
catch (CustomException $e) { 
    // Tampilkan pesan kesalahan yang lebih detail dari metode kustom errorMessage()
    echo $e->errorMessage();
    
} 
// 5. Tangkap (catch) pengecualian umum lainnya (opsional, tapi disarankan)
catch (Exception $e) {
    echo "Pengecualian umum: " . $e->getMessage();
}

?>