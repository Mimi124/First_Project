<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //
        //
    
        public function showAllCourses() {
            $allCourses = Course::all();
            // return view('courses.list', ['courses' => $allCourses]);
            return view('courses.list')
                    ->with('courses', $allCourses);
        }
    
        public function showAddCoursePage(){
            return view('courses.course-form')
             ->with('course', new Course)
             ->with('edit', false);
        }
    
        public function showEditCoursePage($id){
            $course = Course::findOrFail($id);
            return view('courses.course-form')
             ->with('edit', true)
             ->with('course', $course);
        }
    
        public function saveCourse(Request $request){
            // 1st arg -> rules
            // 2nd arg -> custom messages
            // 3rd arg -> attribute names
            $request->validate([
                'name' => 'required|min:10|max:100|unique:courses,name',
                'course_id' => 'required|min:6|max:20|unique:courses,course_id',
                'duration'=> 'required|max:35'
            ],[
                // custom messages
                'unique' => 'This :attribute is already registered in the system'
            ],[
                // custom attribute names
                'name' => 'course name',
            ]);
    
            $newCourse = new Course;
            $newCourse->name = $request->input('name');
            $newCourse->duration = $request->input('duration');
            $newCourse->course_id = $request->input('course_id');
            $newCourse->save();
            session()->flash('alert', $newCourse->name. ' created successfully');
            // $data = $request->all();
            // unset($data['_token']);
            // Course::create($data);
    
            return redirect('/courses');
        }
    
         public function updateCourse(Request $request){
            $course = Course::findOrFail( $request->input('id'));
            $course->name = $request->input('name');
            $course->duration = $request->input('duration');
            $course->course_id = $request->input('course_id');
            $course->save();
            session()->flash('alert', $course->name. ' updated successfully');
            return redirect('/courses');
        }
    
        public function deleteCourse(Request $request){
            $course = Course::findOrFail( $request->input('id'));
            $course->delete();
            session()->flash('alert', $course->name. ' deleted successfully');
            return redirect('/courses');
        }
    }