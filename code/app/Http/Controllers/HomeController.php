<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class HomeController extends Controller
{
    
    public function index()
    {
    	
    	switch(\Auth::user()->role)
    	{
    		case Role::Admin:
    			return view('dashboard.admin');

    		case Role::HEI:
    			return view('dashboard.hei');

    		case Role::Supervisor:
    			return view('dashboard.supervisor');

            default:
                return 'No Assigned Role';
    	}
        
    }
}
