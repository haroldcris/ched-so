<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use Illuminate\Http\Request;



class PreApplicationController extends Controller
{
  
	public function index()
	{
		
		return view('dashboard.preapplication.index');
	}
	
}