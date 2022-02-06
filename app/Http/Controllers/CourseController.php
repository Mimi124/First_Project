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

    public function saveCourse(Request $request){
        // $newCourse = new Course;
        // $newCourse->name = $request->input('name');
        // $newCourse->duration = $request->input('duration');
        // $newCourse->course_id = $request->input('course_id');

        // $newCourse->save();

        $data = $request->all();
        unset($data['_token']);
        Course::create($data);

        return redirect('/courses');
        //  $request->input()
        // dd($newCourse);
    }
}
