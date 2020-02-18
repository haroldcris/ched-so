<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashTraits;
use \Hashids\Hashids;

class SchoolCourse extends Model
{
	use HashTraits;
	
    protected $table = 'school-course';
    protected $guarded = ['id','created_at','updated_at'];


    public function level()
    { 
    	return $this->belongsTo('\App\Models\Level','levelId','id');
    }
}
