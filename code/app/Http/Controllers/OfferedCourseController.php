<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\Rule;
use App\HashGenerator;
use App\Models\SchoolCourse;
use App\Models\School;


class OfferedCourseController extends Controller
{

	private function rules($item)
	{
		$rules  =[
			'code'  		=> ['required', 'max:20', Rule::unique('course', 'code')],
			'description'   => ['required', 'max:200', Rule::unique('course', 'description')],
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
		// $data = school::select('schoolId','courseId','created_at','updated_at')->paginate(20);
		 $data = School::orderBy('name')->paginate(20);
		return view('dashboard.offeredcourse.index', ['data' => $data]);
	}


	public function create()
	{
		return view('dashboard.offeredcourse.create');
	}

	public function edit($hash)
	{
		$id = SchoolCourse::decodeHash($hash);
		$item = User::where('id', $value)->firstOrFail();

        $school = \App\Models\SchoolCourse::select('schoolId','courseId')->get();
        


		return view('dashboard.offeredcourse.edit', [ 'school' => $school, 
           'item' => $item]);
	}

	public function destroy()
	{
		return view('dashboard.offeredcourse.edit');
	}
	
	public function store(Request $request)
	{
		 

	}
}