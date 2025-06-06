<?php

namespace MenyongMenying\PHP\MenyongMenyingLibrary\Data;

use ArrayAccess;
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
 * @method mixed __get(string $key) Mengambil nilai suatu property, jika property yang akan diambil tidak ditemukan maka mengembalikan nilai null.
 * @method bool propertyExists(string $key) Mengecek apakah ada property dengan nama tertentu.
 * 
 * @method bool offsetExists offsetExists(mixed $offset) Implementasi dari class ArrayAccess.
 * @method void offsetSet(mixed $offset, mixed $value) Implementasi dari class ArrayAccess.
 * @method mixed offsetGet(mixed $offset) Implementasi dari class ArrayAccess.
 * @method void offsetUnset(mixed $offset) Implementasi dari class ArrayAccess.
 */
final class Data implements ArrayAccess
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
     * __get(string $key)
     * 
     * Mengambil nilai suatu property, jika property yang akan diambil tidak ditemukan maka mengembalikan nilai null.
     *
     * @param  string $key 
     *
     * @return mixed       
     */
    public function __get(string $key) :mixed
    {
        // Jika ada property yang memiliki nama $key maka akan mengembalikan nilai dari property tersebut.   
        if ($this->propertyExists($key)) {
            return $this->{$key};
        }

        // Jika tidak ditemukan property dengan nama $key maka mengembalikan nilai null.
        return null;
    }

    /**
     * propertyExists(string $key)
     * 
     * Mengecek apakah ada property dengan nama tertentu.
     *
     * @param  string  $key 
     *
     * @return boolean      
     */
    private function propertyExists(string $key) :bool
    {
        // Jika terdepat property dengan nama $key maka mengembalikan nilai true.
        if (isset($this->{$key})) {
            return true;
        }

        // Jika tidak ditemukan property dengan nama $key maka mengembalikan nilai false.
        return false;
    }

    /**
     * offsetExists(mixed $offset)
     * 
     * Method bawaan dari implementasi ArrayAccess
     *
     * @param  mixed   $offset 
     *
     * @return boolean         
     */
    public function offsetExists(mixed $offset): bool
    {
        return $this->propertyExists($offset);
    }

    /**
     * offsetSet(mixed $offset, mixed $value)
     * 
     * Method bawaan dari implementasi ArrayAccess
     *
     * @param  mixed $offset 
     * @param  mixed $value  
     *
     * @return void          
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        // Jika peroperty dengan nama $offset tidak ditemukan maka akan membuat property baru, dan jika sudah ada property dengan nama $offset maka akan mengubah nilai property tersebut
        $this->{$offset} = $value;

        return;
    }

    /**
     * offsetGet(mixed $offset)
     * 
     * Method bawaan dari implementasi ArrayAccess
     *
     * @param  mixed $offset 
     *
     * @return void          
     */
    public function offsetGet(mixed $offset): mixed
    {
        // Jika ada property yang memiliki nama $pffset maka akan mengembalikan nilai dari property tersebut.   
        if ($this->propertyExists($offset)) {
            return $this->{$offset};
        }

        // Jika tidak ditemukan property dengan nama $pffset maka mengembalikan nilai null.
        return null;
    }

    /**
     * offsetUnset(mixed $offset)
     * 
     * Method bawaan dari implementasi ArrayAccess
     *
     * @param  mixed $offset 
     *
     * @return void          
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->{$offset});

        return;
    }
}