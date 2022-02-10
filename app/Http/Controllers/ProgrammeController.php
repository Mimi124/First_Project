<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programmes;
use App\Models\Course;

class ProgrammeController extends Controller
{
    //
    public function showProgrammes() {
        $allProgrammes = Programmes::all();
        return view('programmes.list', ['programmes' => $allProgrammes]);
}

public function showOneProgramme($id){
    $programme = Programmes::findOrFail($id);
  // return view('courses.list', ['courses' => $allCourses]);
  return view('programmes.show')
          ->with('programme', $programme);
}

public function showAddProgrammePage(){
    $allCourses = Course::all();
    return view('programmes.programme-form')
             ->with('programmes', new Programmes)
             ->with('courses',$allCourses)
             ->with('edit', false);
   
}
public function showEditProgrammePage($id){
    $programme = Programmes::findOrFail($id);
    $allCourses = Course::all();
    return view('programmes.programme-form')
     ->with('edit', true)
     ->with('courses',$allCourses)
     ->with('programmes', $programme);
}


public function saveProgrammes(Request $request){

    $request->validate([
        'name' => 'required|min:10|max:100|unique:programmes,name',
        'programme_id' => 'required|min:6|max:20|unique:programmes,programme_id',
        'duration'=> 'required|max:35'
    ],[
        // custom messages
        'unique' => 'This :attribute already exist'
    ],[
        // custom attribute names
        'name' => 'Programme name',
    ]);

    $newProgramme = new Programmes;
    $newProgramme->name = $request->input('name');
    $newProgramme->duration = $request->input('duration');
    $newProgramme->programme_id = $request->input('programme_id');
    $newProgramme->save();
    $newProgramme->courses()->sync($request->input('courses'));
    session()->flash('alert',$newProgramme->name. 'Created Successfully');


    // $data = $request->all();
    // unset($data['_token']);
    // Programmes::create($data);

    return redirect('/programmes');
    //  $request->input()
    // dd($newCourse);
}
public function updateProgrammes(Request $request){
    $programme = Programmes::findOrFail( $request->input('id'));
    $programme->name = $request->input('name');
    $programme->duration = $request->input('duration');
    $programme->programme_id = $request->input('programme_id');
    $programme->save();
    $programme->courses()->sync($request->input('courses'));
    session()->flash('alert',$programme->name. ' Updated Successfully');

    return redirect('/programmes');

}
public function deleteProgramme(Request $request){
    $programme = Programmes::findOrFail( $request->input('id'));
    $programme->delete();
    session()->flash('alert', $programme->name. ' deleted successfully');
    return redirect('/programmes');
}

}


