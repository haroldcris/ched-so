<?php

namespace App\Http\Controllers;

use App\HashGenerator;
use App\Models\Courses;
use App\Models\Application;
use App\Models\SchoolCourse;
use Illuminate\Http\Request;
use App\Models\Status;
use \Carbon\Carbon;



class HeiSoController extends Controller
{
  
	public function rules()
	{
		$rules = [
            'program'   		=> 'required',
            'graduation_date'   => 'required',
        ];


        return $rules;
	}



	public function index()
	{
		$data = Application::where('schoolId', \Auth::user ()->school->id)
									->where('status', Status::Draft)
									->orderbyDesc('created_at')->paginate(20);	
		
		return view('dashboard.hei.so.index', ['data'=> $data]);
	}



	public function track(){
		return view('dashboard.so.index-track');
	}




	public function create()
	{	
		$program = SchoolCourse::select('school-course.id as id', 'course.description', 'course.code', 
										'level.id as levelId', 'level.description as levelDescription')
							->join('school','school.id', '=','school-course.schoolId')
							->join('course', 'course.id', '=', 'school-course.courseId')
							->join('level', 'level.id','=', 'school-course.levelId')
							->where('school.code', \Auth::user()->schoolcode)
							
							->orderBy('level.code')
							->orderBy('course.description')
							->get(); 
				
        return view('dashboard.hei.so.create', ['program' => $program]);    
	}




  	public function store(Request $request)
  	{
  		$students = json_decode($request->input('students'));
  		dd($students);
  		$request->validate($this->rules());


  		$data = \App\Models\SchoolCourse::select('course.id',
                                                    'course.code as courseCode',
                                                    'course.description as courseDescription',

                                                    'level.code as levelCode',
                                                    'level.description as levelDescription',

                                                    'school.id as schoolId',
                                                    'school.code as schoolCode',
                                                    'school.type as schoolType',
                                                    'school.name as schoolName',
                                                    'school.province as schoolProvince',
                                                    'school.town as schoolTown',
                                                    'school.recognition_number',

                                                    'school.updated_by',
                                                    'school.updated_at',
                                                    'school-course.id')

                            ->join('school','school.id', '=','school-course.schoolId')
                            ->join('course', 'course.id', '=', 'school-course.courseId')
                            ->join('level', 'level.id','=', 'school-course.levelId')
                            ->where('school-course.id', $request->input('program'))
                            ->firstOrFail(); 


  		$record = [
			//'tracking_number'   =>  Application::create,
			'userId'   					=>  \Auth::user()->id,
			
			'schoolCourseId'   			=>  $request->input('program'),

			'schoolId'   				=>  $data->schoolId,
			'school_code'   			=>  $data->schoolCode,
			'school_type'		  		=>  $data->schoolType,
			'school_name'   			=> 	$data->schoolName,
			'school_province'  			=>  $data->schoolProvince,
			'school_town'  				=>  $data->schoolTown,

			'school_recognition_number' =>  $data->recognition_number,
			
			'level_code'			=> $data->levelCode,
			'level_description'		=> $data->levelDescription,
			'course_code'  			=>  $data->courseCode,
			'course_description'   	=>  $data->courseDescription,


			'graduation_date'   	=>  \Carbon\Carbon::parse($request->input('graduation_date'))->format('Y-m-d'),
			
			//'student_count'   		=>  '',
			//'so_number'   			=>  '',

			'status'   					=>  'draft',
			'draft_remarks'				=> $request->input('remarks') ?? '',

			'filed_by'   				=>  '', //\Auth::user()->username,
			//'filed_at'   				=>  '' //\Carbon\Carbon::now()->toDateTimeString(),

			// 'received_by'   =>  '',
			//'received_at'   =>  '',

			// 'validated_by'   =>  '',
			//'validated_at'   =>  '',

			// 'approved_by'   =>  '',
			//'approved_at'   =>  '',

			// 'released_by'   =>  '',
			//'released_at'   =>  '',

			// 'void_by'   =>  '',
			//'void_at'   =>  '',

			// 'created_by'   =>  '',
			// 'updated_by'   =>  '',

			];

		//dd($record);

		Application::create($record);

  		$request->session()->flash('message', 'Record has been created');

		return redirect()->route('heiso.index');
 	}	


 	public function edit($hash)
 	{
 		$id = Application::decodeHash($hash);

 		// dd($id, $hash);
 		$data = Application::where('id', $id)->firstOrFail();

 		$program = SchoolCourse::select('school-course.id as id', 'course.description', 'course.code', 
										'level.id as levelId', 'level.description as levelDescription')
							->join('school','school.id', '=','school-course.schoolId')
							->join('course', 'course.id', '=', 'school-course.courseId')
							->join('level', 'level.id','=', 'school-course.levelId')
							->where('school.code', \Auth::user()->schoolcode)
							
							->orderBy('level.code')
							->orderBy('course.description')
							->get(); 
				
        return view('dashboard.hei.so.edit', ['program' => $program, 'data' => $data]);    
 	}


 	public function update()
 	{

 	}



	public function destroy(Request $request)
	{

		$item = Application::where('id',$request->input('id'))->firstOrFail();

		$item->delete();

		$request->session()->flash('message', 'Item Deleted Successfully');
		return back();
	}



	public function submit(Request $request)
	{
		$request->validate(['id' => 'required']);


		$id = $request->input('id');
		$data = \App\Models\Application::select('id', 'status')
										->where('status' , Status::Draft)
										->where('id', $id)
										->firstOrFail();

		$data->update([
			'id'		=> $request->input('id'),
			'status' 	=> Status::Filed,
			'filed_by'  => \Auth::user()->username,
			'filed_at'   => Carbon::now()->toDateTimeString(),
		]);	

		$request->session()->flash('message', 'Item has been successfully submitted');
		return redirect()->route('heiso.index');
	}



	public function pending()
	{
		$data = Application::where('schoolId', \Auth::user ()->school->id)
									->where('status', Status::Filed)
									->orderbyDesc('created_at')->paginate(20);	
		
		return view('dashboard.hei.so.filed', ['data'=> $data]);
	}

}
