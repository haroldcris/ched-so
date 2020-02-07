<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use Illuminate\Http\Request;



class ApprovedAppController extends Controller
{
  
	public function index()
	{
		
		return view('dashboard.approvedapp.index');
	}
	
}