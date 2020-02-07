<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use App\Models\Courses;
use App\Models\Application;
use App\Models\SchoolCourse;
use Illuminate\Http\Request;
use App\Models\Status;
use \Carbon\Carbon;


class SupervisorValidatedSoController extends Controller
{
  
	public function index()
	{
		$data = Application::where('status', Status::Validated)
							->orderbyDesc('created_at')->paginate(20);	
		
		return view('dashboard.supervisor.so.validated', ['data'=> $data]);
	}

}
