<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use Illuminate\Http\Request;



class DeficientController extends Controller
{
  
	public function index()
	{
		
		return view('dashboard.deficientapp.index');
	}
	
}