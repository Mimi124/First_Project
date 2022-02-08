<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //

    public function showAllCourses() {
        $allCourses = Course::all();
        // return view('courses.list', ['courses' => $allCourses]);
        return view('courses.list')
                ->with('courses', $allCourses);
    }

    public function showAddCoursePage(){
        return view('courses.course-form');
    }
    public function showEditCoursePage($id){
        //$course = Course::find($id);
        $course = Course::findOrFail($id);

        return view('courses.course-form')
            ->with('course', $course);;
    }


        public function saveCourse(Request $request){
            $newCourse = new Course;
            $newCourse->name = $request->input('name');
            $newCourse->duration = $request->input('duration');
            $newCourse->course_id = $request->input('course_id');
            $newCourse->save();

            return redirect('/courses');

    }
    public function updateCourse(Request $request){
        $course = Course::findOrFail( $request->input('id'));
        $course->name = $request->input('name');
        $course->duration = $request->input('duration');
        $course->course_id = $request->input('course_id');
        $course->save();

        return redirect('/courses');

        
        // $data = $request->all();
        // unset($data['_token']);
        // Course::create($data);
        //$course->save();

       // return redirect('/courses');
        //  $request->input()
        // dd($newCourse);
    }
}
