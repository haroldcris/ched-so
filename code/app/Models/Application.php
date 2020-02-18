<?php

namespace App\Models;

use App\HashGenerator;
use Illuminate\Database\Eloquent\Model;
use \Hashids\Hashids;
use App\Traits\HashTraits;
use App\User;

class Application extends Model
{
    use HashTraits;

    protected $table ='application';

    protected $guarded = ['id','date_filed'];


    public function TrackingHashId() 
    {
        $alphabet = "123456789ACEFGHKLRSTUVXYZ";  // OO W  P  I J Q  BdMN P ryhme

        $hash = new Hashids(HashGenerator::$HashSalt, 6 ,$alphabet);

        return $hash->encode($this->id);
    }


    public static function IdFromHash($hashCode)
    {
        $alphabet = "123456789ACEFGHKLRSTUVXYZ";  // OO W  P  I J Q  BdMN P ryhme
    	$hash = new Hashids(HashGenerator::$HashSalt, 6 ,$alphabet);        
        return $hash->decode($hashCode);
    }

    
}
