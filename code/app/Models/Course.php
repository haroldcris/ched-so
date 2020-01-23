<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';


    public function School()
    {
    	return $this->belongsToMany('App\Models\School', 'school-course', 'courseid', 'schoolid');
    }
}
