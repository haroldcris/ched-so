<?php

namespace App\Traits;

use App\HashGenerator;
use \Hashids\Hashids;

trait HashTraits
{
	public $hash;

	public function hashId()
    {
        return HashGenerator::Encode($this->id);
    }

    public static function decodeHash($value)
    {
        return HashGenerator::Decode($value);
    }

}