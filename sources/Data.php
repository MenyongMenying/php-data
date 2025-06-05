<?php

namespace MenyongMenying\PHP\MenyongMenyingLibrary\Data;


use Exception;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * 
 * @version 0.0.1
 * 
 * @since 2025-06-04
 * 
 * @method void __construct(array $data = [])
 * @method void __set(string $key, mixed $value) Membuat/mengubah suatu property.
 * @method bool existsProperty(string $key) Mengecek apakah ada property dengan nama tertentu.
 */
final class Data
{
    /**
     * __construct(array $data = [])
     *
     * @param array $data Data dalam bentuk array asosiatif, di mana kunci array menjadi nama properti dan nilainya adalah isi dari properti tersebut.
     *
     * @throws Exception Jika ada kunci array yang bukan bertipe string.
     *
     * @return void
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {

            // Pastikan key adalah string, karena akan digunakan sebagai nama properti
            if (!is_string($key)) {
                throw new Exception("Index dari property harus bertipe string.");
            }

            // Set properti dinamis dengan nama $key dan nilai $value
            $this->{$key} = $value;
        }

        return;
    }

    /**
     * __set(string $key, mixed $value)
     * 
     * Membuat/mengubah nilai suatu property.
     *
     * @param  string $key   
     * @param  mixed  $value 
     *
     * @return void          
     */
    public function __set(string $key, mixed $value) :void
    {
        // Jika peroperty dengan nama $key tidak ditemukan maka akan membuat property baru, dan jika sudah ada property dengan nama $key maka akan mengubah nilai property tersebut
        $this->{$key} = $value;

        return;
    }

    /**
     * existsProperty(string $key)
     * 
     * Mengecek apakah ada property dengan nama tertentu.
     *
     * @param  string  $key 
     *
     * @return boolean      
     */
    private function existsProperty(string $key) :bool
    {
        // Jika terdepat property dengan nama $key maka mengembalikan nilai true.
        if (isset($this->{$key})) {
            return true;
        }

        // Jika tidak ditemukan property dengan nama $key maka mengembalikan nilai false.
        return false;
    }
}