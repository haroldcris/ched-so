<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use App\Models\Courses;
use App\Models\Application;
use App\Models\SchoolCourse;
use Illuminate\Http\Request;
use App\Models\Status;
use \Carbon\Carbon;


class SupervisorFiledSoController extends Controller
{
  
	public function index()
	{
		$data = Application::where('status', Status::Received)
							->orderbyDesc('created_at')->paginate(20);	
		
		return view('dashboard.supervisor.so.index', ['data'=> $data]);
	}


	public function submit(Request $request)
	{
		$request->validate(['id' => 'required']);

		$id = $request->input('id');

		$data = \App\Models\Application::select('id', 'status')
										->where('status' , Status::Received)
										->where('id', $id)
										->firstOrFail();

		$data->update([
			'id'		=> $request->input('id'),
			'status' 	=> Status::Validated,
			'validated_by'  => \Auth::user()->username,
			'validated_at'   => Carbon::now()->toDateTimeString(),
		]);	

		$request->session()->flash('message', 'Item has been successfully Validated');
		return redirect()->route('supervisorfiledso.index');
	}

}
