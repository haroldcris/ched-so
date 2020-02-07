<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\school;

class ProfileController extends Controller
{
  
	public function index()
	{
		if(\Auth::guest())
            return redirect()->route('login');
       
        return view('dashboard.profile.index');

		
	}

    public function store(Request $request)
    {   
        $request->validate([
            'password'=> ['required','string', 'min:8', 'confirmed']
        ]);



        $user = \Auth::user();

        $data['id'] = \Auth::user()->id;
        $data['password'] = Hash::make($request->input('password'));

        $user->update($data);


        $request->session()->flash('message', 'Password Changed');

        return redirect()->route('home');
    }

    public function change()
    {
        return view('dashboard.profile.changepw');
    }

	public function edit($hash)
    {
        $value = HashGenerator::Decode($hash);
        
        $item = User::where('id', $value)->firstOrFail();

       
        
        return view('dashboard.profile.index', [ 'item' => $item]);                                             
    }

    public function update(Request $request)
    {
        $item = User::where('id', \Auth::user()->id)->firstOrFail();

        $request->validate([
             'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $item->update(['password'  => Hash::make($request->input('password'))]);

        $request->session()->flash('message', 'Password has been successfully Updated');

        return redirect()->route('profile.index');
    }

	
}