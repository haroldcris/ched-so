<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use App\Models\Courses;
use App\Models\Application;
use App\Models\SchoolCourse;
use Illuminate\Http\Request;
use App\Models\Status;
use \Carbon\Carbon;



class AdminSoController extends Controller
{
  

	public function index()
	{
		$data = Application::where('status', Status::Filed)
							->orderbyDesc('created_at')->paginate(20);	
		
		return view('dashboard.admin.so.index', ['data'=> $data]);
	}



	public function submit(Request $request)
	{
		$request->validate(['id' => 'required']);


		$id = $request->input('id');
		$data = \App\Models\Application::select('id', 'status')
										->where('status' , Status::Filed)
										->where('id', $id)
										->firstOrFail();

		$data->update([
			'id'		=> $request->input('id'),
			'status' 	=> Status::Received,
			'received_by'  => \Auth::user()->username,
			'received_at'   => Carbon::now()->toDateTimeString(),
		]);	

		$request->session()->flash('message', 'Item has been successfully marked as Received');
		return redirect()->route('adminso.index');
	}



	public function pending()
	{
		$data = Application::where('schoolId', \Auth::user ()->school->id)
									->where('status', Status::Filed)
									->orderbyDesc('created_at')->paginate(20);	
		
		return view('dashboard.hei.so.filed', ['data'=> $data]);
	}

}
