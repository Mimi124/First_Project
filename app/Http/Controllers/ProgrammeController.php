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

}
