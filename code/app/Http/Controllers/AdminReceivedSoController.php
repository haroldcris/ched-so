<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use App\Models\Courses;
use App\Models\Application;
use App\Models\SchoolCourse;
use Illuminate\Http\Request;
use App\Models\Status;
use \Carbon\Carbon;



class AdminReceivedSoController extends Controller
{
  
	public function index()
	{
		$data = Application::where('status', Status::Received)
							->orderbyDesc('received_at')->paginate(20);	
		
		return view('dashboard.admin.so.received', ['data'=> $data]);
	}

}
