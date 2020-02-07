<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use Illuminate\Http\Request;



class DocsValidationController extends Controller
{
  
	public function index()
	{
		
		return view('dashboard.docsvalidation.index');
	}
	
}