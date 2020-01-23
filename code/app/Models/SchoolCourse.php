<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolCourse extends Model
{
    protected $table = 'school-course';


    public function Level()
    {
    	return $this->belongsTo('App\Models\Level','levelId','id');
    }
}
