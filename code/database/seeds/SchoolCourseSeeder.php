<?php

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Course;
use App\Models\Level;

class SchoolCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$data = School::orderByRaw('rand()')->take(2)->get();
        $schoolCol = School::orderBy('id')->take(5)->get();

        $courseCol = Course::orderByRaw('rand()')->take(5)->get();


        $table = DB::table('school-course');

        foreach($schoolCol as $school)
        {
            

        	foreach($courseCol as $course)
        	{

                $levelCol = Level::orderBy('code')->take(rand(1,4))->get();
                
                foreach($levelCol as $level)
                {
                    $table->insert(
                    [
                        'schoolId' => $school->id,
                        'courseId' => $course->id,
                        'levelId' => $level->id
                    ]); 

                }
	        	
        	}
        }        
    }

}
