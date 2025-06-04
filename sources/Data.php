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
}