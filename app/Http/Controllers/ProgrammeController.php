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
    return view('programmes.programme-form');
}

public function saveProgrammes(Request $request){
    // $newProgramme = new Programmes;
    // $newProgramme->name = $request->input('name');
    // $newProgramme->duration = $request->input('duration');
    // $newProgramme->programme_id = $request->input('programme_id');

    // $newCourse->save();

    $data = $request->all();
    unset($data['_token']);
    Programmes::create($data);

    return redirect('/programmes');
    //  $request->input()
    // dd($newCourse);
}

}
