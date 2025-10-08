<?php

class Str
{
    private static $methods = [
        'upper' => 'strtoupper',
        'lower' => 'strtolower',
        'len'   => 'strlen'
    ];
    
    public static function __callStatic(string $method, array $parameters)
    {
        // Pengecekan apakah metode yang diminta ada dalam array $methods
        if (!array_key_exists($method, self::$methods)) {
            // Penanganan Pengecualian
            throw new Exception('The ' . $method . ' is not supported.');
        }
        
        // Memanggil fungsi PHP yang sesuai dengan parameter yang diberikan
        return call_user_func_array(self::$methods[$method], $parameters);
    }
}

echo Str::lower('Hello') . '<br>';
echo Str::upper('Hello') . '<br>';
echo Str::len('Hello') . '<br>';

?>