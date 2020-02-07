<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use App\Models\Courses;
use App\Models\Application;
use App\Models\SchoolCourse;
use Illuminate\Http\Request;
use App\Models\Status;
use \Carbon\Carbon;


class HeiReleasedSoController extends Controller
{
  
	public function index()
	{
		$data = Application::where('schoolId', \Auth::user ()->school->id)
							->where('status', Status::Released)
							->orderbyDesc('created_at')->paginate(20);	
		
		return view('dashboard.hei.so.filed', ['data'=> $data]);
	}

}
