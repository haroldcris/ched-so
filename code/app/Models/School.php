<?php

namespace App\Models;

use App\HashGenerator;
use App\Traits\HashTraits;
use Illuminate\Database\Eloquent\Model;
use \Hashids\Hashids;


class School extends Model
{
    use HashTraits;

    protected $table ='school';
    protected $guarded = ['id','created_at','updated_at'];
   
    public function offeredCourse()
    {
    	return $this->belongsToMany('\App\Models\Course', 'school-course', 'schoolId', 'courseId')                                
    				->withPivot('levelId');

    	// return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }


}