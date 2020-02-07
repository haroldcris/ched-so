<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use Illuminate\Http\Request;



class PendingAppController extends Controller
{
  
	public function index()
	{
		
		return view('dashboard.pendingapp.index');
	}
	
}