<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Application;


class HomeController extends Controller
{
    
    public function index()
    {
    	if(\Auth::guest())
            return redirect()->route('login');

    
      


    	switch(\Auth::user()->role)
    	{
    		case Role::Admin:

                $filed = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('status','Filed')
                                        ->firstOrFail();

                $user = \App\User::select(\DB::raw('count(*) Total'))
                                                    ->firstOrFail();

                $school = \App\Models\School::select(\DB::raw('count(*) Total'))
                                                    ->firstOrFail();



                $course = \App\Models\Course::select(\DB::raw('count(*) Total'))
                                                    ->firstOrFail();

                $deficient = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('status','deficient')
                                        ->firstOrFail();

                $theme = 'theme-green';

    			return view('dashboard.admin', ['filed' => $filed->Total,
                                                'user' => $user->Total, 
                                                'school' =>$school->Total, 
                                                'course' => $course->Total,
                                                'deficient' =>$deficient->Total,
                                                'theme' =>$theme]);


    		case Role::HEI:
                
                 $filed = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('userId',\Auth::user()->id)
                                        ->where('status','Filed')
                                        ->firstOrFail();

                $released = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('userId',\Auth::user()->id)
                                        ->where('status','Released')
                                        ->firstOrFail();

                $deficient = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('status','deficient')
                                        ->firstOrFail();

                $theme = 'theme-cyan';

    			return view('dashboard.hei', ['filed' => $filed->Total, 
                                              'released' => $released->Total, 
                                              'deficient' => $deficient->Total, 
                                              'theme'=> $theme]);


    		case Role::Supervisor:

                $filed = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('status','Filed')
                                        ->firstOrFail();

                $validated = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('status','Filed')
                                        ->firstOrFail();

                $deficient = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('status','deficient')
                                        ->firstOrFail();

                $theme = 'theme-black';


    			return view('dashboard.supervisor', ['filed'=> $filed->Total, 
                                                    'validated' =>$validated->Total, 
                                                    'deficient' => $deficient->Total, 
                                                    'theme' => $theme]);

            default:
                return 'No Assigned Role';
    	}
        
    }




    public function test(Request $request)
    {   

        
        $data = \App\Models\Application::select(\DB::raw('count(*) Total'))
                                        ->where('userId',\Auth::user()->id)
                                        ->where('status','Filed')
                                        ->firstOrFail();


        echo($data->Total);

        return;

        // dd($data);

        // $program = \App\Models\Application::where('schoolId',\Auth::user()->school->id)
        //                     ->where('status','draft') 
        //                     ->orderbyDesc('created_at')->get();

        // $program = \App\Models\SchoolCourse::select('course.id',
        //                                             'course.code as course_code',
        //                                             'course.description as course_desc',
        //                                             'school.id',
        //                                             'school.code as school_code',
        //                                             'school.type',
        //                                             'school.name',
        //                                             'school.province as province',
        //                                             'school.town',
        //                                             'school.recognition_number',
        //                                             'school.contact_person',
        //                                             'school.contact_number',

        //                                             'school.updated_by',
        //                                             'school.updated_at',
        //                                              'school-course.id')
        //                     ->join('school','school.id', '=','school-course.schoolId')
        //                     ->join('course', 'course.id', '=', 'school-course.courseId')
        //                     ->join('level', 'level.id','=', 'school-course.levelId')
        //                     ->where('school-course.id', 1)
        //                     ->get(); 
        
        return $request->all();

        //return \App\Models\Application::TrackingHashId(rand(1,1000));
    }
}
