<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class SchoolController extends Controller
{
    // Provide $item for edit or NULL for New Record
    private function rules($item){

        $rules = [
            'code'      => 'required|unique:school,code',
            'name'      => 'required|unique:school,name',
            'type'      => 'required',
            'province'  => 'required',
            'town'      => 'required',
            'contact_person'  => 'required',
            'contact_number'  => 'required',
        ];



        if(isset($item)) 
        {
            //Modify the Rules for Updating Record
            $rules['code'] = 'required|unique:school,code,'.$item->code.',code';
            $rules['name'] = ['required',Rule::unique('school','name')->ignore($item->name,'name')];
        }

        return $rules;
    }



    public function index()
    {
        $data = School::orderBy('name')->paginate(20);
        return view('dashboard.school.index', ['data' => $data] );
    }


    public function create()
    {        
        return view('dashboard.school.create');
    }


    public function store(Request $request)
    {        
        $request->validate($this->rules(null));

        $data = array_merge($request->all(),['updated_by' => \Auth::user()->username,
                                             'created_by' => \Auth::user()->username]);
        School::create($data);

        $request->session()->flash('message', 'Record has been created');
        return redirect()->route('school.index');
    }


    public function show(Institution $institution)
    {
        //
    }


    public function edit($hash)
    {
        $value = HashGenerator::Decode($hash);

        $item = School::where('id',$value)->firstOrFail();        
 
        return view('dashboard.school.edit', ['item' => $item]);
    }


    public function update(Request $request)
    {
        $item = School::where('id',$request->input('id'))->firstOrFail();

        $request->validate($this->rules($item));
        

        $data = array_merge($request->all(),['updated_by' => \Auth::user()->username]);
        $item->update($data);

        $request->session()->flash('message', 'Record has been successfully Updated');
        return redirect()->route('school.index');
    }

    
    public function destroy(Request $request)
    {
        $item = School::where('id',$request->input('id'))
        ->firstOrFail();

        $item->delete();

        $request->session()->flash('message', 'Item Deleted Successfully');
        return redirect()->route('school.index');
    }
    

    public function search(Request $request)
    {
        $request->validate(['search' => 'required']);

        $data = $request->input('search');
        $itemCol = School::select('id','code','name','type')
                        ->where('name', 'like', '%'. $data .'%')
                        ->orderBy('name')
                        ->take(10)
                        ->get();
        
        $i = 0;
        $result = array();
        foreach($itemCol as $item){
            $result[$i]['id'] = $item->id ;
            $result[$i]['code'] = $item->code ;
            $result[$i]['name'] = $item->name ;
            $result[$i]['type'] = $item->type ;
            $result[$i]['key'] = $item->hashId() ;
            $i++;
        }

        return json_encode($result);
    }
}
