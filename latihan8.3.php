<?php

class Str
{
    private $s = '';
    
    private $functions = [
        'length' => 'strlen',
        'upper' => 'strtoupper',
        'lower' => 'strtolower',
        // map more method to functions
    ];
    
    public function __construct(string $s)
    {
        $this->s = $s;
    }
    
    public function __call($method, $args)
    {
        // Pengecualian BadMethodCallException harus didefinisikan secara terpisah, 
        // atau ini akan menggunakan Exception default.
        if (!in_array($method, array_keys($this->functions))) {
            // throw new BadMethodCallException(); 
            // Menggunakan Exception bawaan untuk kompatibilitas jika BadMethodCallException
            // belum didefinisikan sebagai kelas kustom.
            throw new Exception("Method '{$method}' does not exist."); 
        }
        
        // Menambahkan string ($this->s) sebagai argumen pertama ke array $args
        array_unshift($args, $this->s);
        
        // Memanggil fungsi PHP yang sesuai
        return call_user_func_array($this->functions[$method], $args);
    }
}

$s = new Str('Hello, World!');

echo $s->upper() . '<br>';
echo $s->lower() . '<br>';
echo $s->length() . '<br>';

?>