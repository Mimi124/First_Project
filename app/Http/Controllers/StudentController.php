<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Programmes;

class StudentController extends Controller
{
    //
            public function showAllStudents(Request $request) {
            $searchTerm = $request->query('search');
             if($searchTerm == null){
                 $allStudent = Student::paginate(10);
             } else {
                  $allStudent = Student::where('name','like', "%{$searchTerm}%")
                  ->orWhere('student_id','like', "%{$searchTerm}%")->paginate(10);
             }
        return view('students.list')
                ->with('students', $allStudent);
    }

    public function showOneStudent($id){
          $student = Student::findOrFail($id);
        // return view('courses.list', ['courses' => $allCourses]);
        return view('students.show')
                ->with('student', $student);
    }

    public function showAddStudentPage(){
        $allProgramme = Programmes::all();
        return view('students.student-form')
        ->with('student', new Student)
        ->with('programmes', $allProgramme)
        ->with('edit', false);
    }
    public function showEditStudentPage($id){
        $student = Student::findOrFail($id);
        $allProgramme = Programmes::all();
        return view('students.student-form')
         ->with('edit', true)
         ->with('programmes', $allProgramme)
         ->with('student', $student);
         
    }

    public function saveStudent(Request $request){

        $request->validate([
            'firstname' =>'required',
            'lastname' =>'required',
            'date_of_birth' =>'required',
            'student_id' => 'required|min:6|max:20|unique:students,student_id',
            'gender'=> 'required',
            'contact' => 'required',
        ],[
            // custom messages
            'unique' => 'This :attribute is already registered in the system'
        ],[
            // custom attribute names
            'student_id' => 'Student ID',
        ]);

        $newStudent = new Student;
        $newStudent->firstname = $request->input('firstname');
        $newStudent->lastname = $request->input('lastname');
        $newStudent->date_of_birth = $request->input('date_of_birth');
        $newStudent->student_id= $request->input('student_id');
        $newStudent->gender = $request->input('gender');
        $newStudent->contact = $request->input('contact');
        $newStudent->programme_id = $request->input('programme_id');

        $newStudent->save();


        return redirect('/students');
        //  $request->input()
        // dd($newProgramme);
    }
    public function updateStudent(Request $request){
        $student = Student::findOrFail( $request->input('id'));
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->date_of_birth = $request->input('date_of_birth');
        $student->student_id = $request->input('student_id');
        $student->gender = $request->input('gender');
        $student->contact= $request->input('contact');
        $student->programme_id= $request->input('programme_id');
        $student->save();
        session()->flash('alert', $student->firstname. ' updated successfully');
        return redirect('/students');
    }

    public function deleteStudent(Request $request){
        // dd($request);
        $student = Student::findOrFail( $request->input('id'));
        $student->delete();
        session()->flash('alert', $student->firstname. ' deleted successfully');
        return redirect('/students');
    }
}



