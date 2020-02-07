<?php

namespace App\Models;

use App\HashGenerator;
use App\Traits\HashTraits;
use Illuminate\Database\Eloquent\Model;
use \Hashids\Hashids;


class Course extends Model
{
    use HashTraits;

    protected $table = 'course';
    protected $guarded = ['id','created_at','updated_at'];


    public function School()
    {
    	return $this->belongsToMany('App\Models\School', 'school-course', 'courseid', 'schoolid');
    }
}
