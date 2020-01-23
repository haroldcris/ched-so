<?php

namespace App\Models;

use App\HashGenerator;
use Illuminate\Database\Eloquent\Model;
use \Hashids\Hashids;

class Courses extends Model
{
    protected $table ='courses';
    protected $guarded = ['id','created_at','updated_at'];

    // protected $fillable = [
    //     'hei_type', 'address', 'gov_regnumber', 'contact_person', 'contact_number'
    // ];

    


    public function hashId()
    {
        return HashGenerator::Encode($this->id);
    }

    public static function decodeHash($value)
    {
        return HashGenerator::Decode($value);
    }
}
