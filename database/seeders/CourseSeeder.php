<?php

namespace Database\Seeders;

use App\Models\Course;
// use App\Models\Programmes;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $programme = Programmes::find(1);
        // $course = new Course();
        // $course->name = "Laravel Essentials";
        // $course->duration = 15;
        // $course->course_id = 'LAV100';
        // $course->save();
        // $course->programmes()->attach($programme);

        for ($i=0 ; $i < 200; $i++ ) {
            DB::table('courses')->insert([
            'name' => 'Software Engineering '.$i,
            'course_id' => 'SE20221'.@$i,
            'duration' =>rand(35,60),
            'created_at' => Carbon::now()
            ]);

            DB::table('courses')->insert([
                'name' => 'HTML/CSS '.$i,
                'course_id' => 'HTCS2.0'.@$i,
                'duration' =>rand(35,60),
                'created_at' => Carbon::now()
            ]);
            

    }
}
}
