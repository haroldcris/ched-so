<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SchoolController extends Controller
{
    public function index()
    {
        $data = School::orderBy('name')->paginate(30);
        return view('dashboard.school.index', ['data' => $data] );
    }

    public function create()
    {
        return view('dashboard.school.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'   => 'required|unique:school,code',
            'name'   => 'required|unique:school,name',


        ]);

        School::create($request->all());


        $request->session()->flash('message', 'Record has been created');
        return redirect()->route('schools.index');
    }

    public function show(Institution $institution)
    {
        //
    }

    public function edit($hash)
    {
        $value = HashGenerator::Decode($hash);

        $item = School::where('id',$value)->firstOrFail();

        // dd($item);
 
        return view('dashboard.school.edit', ['item' => $item]);
    }

    public function update(Request $request)
    {
        $item = School::where('id',$request->input('id'))->firstOrFail();

        $validated = $request->validate([
            'code'   => 'required|unique:school,code,'.$item->code.',code',
            'name'   => ['required',Rule::unique('school','name')->ignore($item->name,'name')]
        ]);
        
        $item->update($request->all());

        $request->session()->flash('message', 'Record has been successfully Updated');
        return redirect()->route('schools.index');

    }
    public function destroy(Request $request)
    {
        $item = School::where('id',$request->input('id'))
        ->firstOrFail();

        $item->delete();

        $request->session()->flash('message', 'Item Deleted Successfully');
        return back();
    }
    
}
