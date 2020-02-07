<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\Rule;
use App\HashGenerator;

class CourseController extends Controller
{
	private function rules($item)
	{
		$rules  =[
			'code'  		=> ['required', 'max:20', Rule::unique('course', 'code')],
			'description'   => ['required', 'max:150', Rule::unique('course', 'description')],
		];

		if(isset($item)) 
        {   
        	$rules['code'] = ['required',Rule::unique('course','code')->ignore($item->code,'code')];     	
            $rules['description'] = ['required',Rule::unique('course','description')->ignore($item->description,'description')];
        }

        return $rules;
	}



	public function index()
	{
		$data = Course::orderBy('description')->paginate(20);
		return view('dashboard.course.index', ['data' => $data]);
	}


	public function create()
	{
		return view('dashboard.course.create');
	}


	public function store(Request $request)
	{
		$request->validate($this->rules(null));

		$data = array_merge($request->all(),['updated_by' => \Auth::user()->username,
											 'created_by' => \Auth::user()->username]);
		Course::create($data);

		$request->session()->flash('message', 'Record has been created');

		return redirect()->route('course.index');
	}


	public function edit($hash)
	{
		$value = HashGenerator::Decode($hash);

		$item  = Course::where('id',$value)->firstOrFail();

		return view('dashboard.course.edit', ['item' => $item ]);        
	}


	public function update(Request $request, $hash)
	{
		$value = HashGenerator::Decode($hash);
		$item = Course::where('id',$value)->firstOrFail();

		$request->validate( $this->rules($item) );

		$data = array_merge($request->all(),['updated_by' => \Auth::user()->username]);

		$item->update($data);

		$request->session()->flash('message', 'Record has been successfully Updated');
		return redirect()->route('course.index');
	}



	public function destroy(Request $request)
	{

		$item = Course::where('id',$request->input('id'))->firstOrFail();

		$item->delete();

		$request->session()->flash('message', 'Item Deleted Successfully');
		return back();
	}


	public function search(Request $request)
    {
        $request->validate(['search' => 'required']);

        $data = $request->input('search');
        $itemCol = Course::select('id','code','description')
                        ->where('description', 'like', '%'. $data .'%')
                        ->orderBy('description')
                        ->take(10)
                        ->get();
        
        $i = 0;
        $result = array();
        foreach($itemCol as $item){
            $result[$i]['id'] = $item->id ;
            $result[$i]['code'] = $item->code ;
            $result[$i]['description'] = $item->description ;
            $result[$i]['key'] = $item->hashId() ;
            $i++;
        }

        return json_encode($result);
    }
}