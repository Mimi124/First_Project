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

    }
    public function updateCourse(Request $request){
        $course = Course::findOrFail( $request->input('id') );
        $course = new Course;
        $course->name = $request->input('name');
        $course->duration = $request->input('duration');
        $course->course_id = $request->input('course_id');

        $course->save();

        //$course->save();
        // $data = $request->all();
        // unset($data['_token']);
        // Course::create($data);

        return redirect('/courses');
        //  $request->input()
        // dd($newCourse);
    }
}
