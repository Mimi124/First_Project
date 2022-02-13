<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Programmes;

class CourseController extends Controller
{
    //
    public function showAllCourses(Request $request) {
        $searchTerm = $request->query('search');
         if($searchTerm == null){
             $allCourses = Course::paginate(10);
         } else {
              $allCourses = Course::where('name','like', "%{$searchTerm}%")
              ->orWhere('course_id','like', "%{$searchTerm}%")->paginate(10);
         }
        return view('courses.list')
                ->with('courses', $allCourses);
    }

    public function showOneCourse($id){
        $course = Course::findOrFail($id);
         return view('courses.show')
       ->with('course', $course);
   }


    public function showAddCoursePage(){
        $allProgrammes = Programmes::all();

        return view('courses.course-form')
         ->with('course', new Course)
         ->with('programmes', $allProgrammes)
         ->with('edit', false);
    }

    public function showEditCoursePage($id){
        $course = Course::findOrFail($id);
         $allProgrammes = Programmes::all();

        return view('courses.course-form')
         ->with('edit', true)
          ->with('programmes', $allProgrammes)
         ->with('course', $course);
    }

    public function saveCourse(Request $request){
        // dd($request);
        // 1st arg -> rules
        // 2nd arg -> custom messages
        // 3rd arg -> attribute names
        $request->validate([
            'name' => 'required|min:10|max:100|unique:courses,name',
            'course_id' => 'required|min:3|max:20|unique:courses,course_id',
            'duration'=> 'required',
            'programmes' => 'sometimes|exists:programmes,id'
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
        $newCourse->programmes()->sync($request->input('programmes'));
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
        $course->programmes()->sync($request->input('programmes'));
        session()->flash('alert', $course->name. ' updated successfully');
        return redirect('/courses');
    }

    public function deleteCourse(Request $request){
       // dd($request);
        $course = Course::findOrFail( $request->input('id'));
        $course->delete();
        session()->flash('alert', $course->name. ' deleted successfully');
        return redirect('/courses');
    }
}