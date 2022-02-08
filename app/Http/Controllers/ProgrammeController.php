<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programmes;

class ProgrammeController extends Controller
{
    //
    public function showProgrammes() {
        $allProgrammes = Programmes::all();
        return view('programmes.list', ['programmes' => $allProgrammes]);
}
public function showAddProgrammePage(){
    return view('programmes.programme-form')
             ->with('programmes', new Programmes)
             ->with('edit', false);
   
}
public function showEditCoursePage($id){
    $programmes = Programmes::findOrFail($id);
    return view('programmes.programme-form')
     ->with('edit', true)
     ->with('programmes', $programmes);
}


public function saveProgrammes(Request $request){

    $request->validate([
        'name' => 'required|min:10|max:100|unique:programmes,name',
        'programme_id' => 'required|min:6|max:20|unique:programmes,programme_id',
        'duration'=> 'required|max:35'
    ]);

    $newProgramme = new Programmes;
    $newProgramme->name = $request->input('name');
    $newProgramme->duration = $request->input('duration');
    $newProgramme->programme_id = $request->input('programme_id');
    $newProgramme->save();
    session()->flash('alert',$newProgramme->name. 'Created Successfully');


    // $data = $request->all();
    // unset($data['_token']);
    // Programmes::create($data);

    return redirect('/programmes');
    //  $request->input()
    // dd($newCourse);
}
public function updateProgrammes(Request $request){
    $programmes = Programmes::findOrFail( $request->input('id'));
    $programmes->name = $request->input('name');
    $programmes->duration = $request->input('duration');
    $programmes->programme_id = $request->input('programme_id');
    $programmes->save();
    session()->flash('alert',$programmes->name. ' Updated Successfully');

    return redirect('/programmes');

}
public function deleteProgramme(Request $request){
    $programmes = Programmes::findOrFail( $request->input('id'));
    $programmes->delete();
    session()->flash('alert', $programmes->name. ' deleted successfully');
    return redirect('/programmes');
}

}


