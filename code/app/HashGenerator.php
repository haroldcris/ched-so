<?php 


namespace App;

use \Hashids\Hashids;

class HashGenerator
{
    public static $HashSalt = '20200101';
    public static $HashLength = 10;

    public static function Encode(int $data)
    {
        $hash = new Hashids(HashGenerator::$HashSalt, HashGenerator::$HashLength);
        return $hash->encode($data);
    }

    public static function Decode ($data)
    {
        $hash = new Hashids(HashGenerator::$HashSalt, HashGenerator::$HashLength);
        return $hash->decode($data);
    }    
}