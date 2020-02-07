<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use Illuminate\Http\Request;



class ArchivedController extends Controller
{
  
	public function index()
	{
		
		return view('dashboard.archived.index');
	}
	
}