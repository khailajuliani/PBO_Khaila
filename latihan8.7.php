<?php

// create function with an exception
function checkNum($number) {
    if ($number > 1) {
        // Melemparkan (throw) objek Exception jika kondisi tidak terpenuhi
        throw new Exception("Value must be 1 or below");
    }
    return true;
}

// trigger exception in a "try" block
try {
    // Panggil fungsi yang mungkin melempar exception
    checkNum(2); 
    
    // Jika exception dilempar, teks ini tidak akan ditampilkan
    echo 'If you see this, the number is 1 or below';
}

// catch exception
catch(Exception $e) {
    // Menangkap (catch) exception dan menampilkan pesan kesalahan
    echo 'Message: ' . $e->getMessage();
}

?>