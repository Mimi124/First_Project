<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
       
       {  //
       DB::table('programmes')->insert([
       'name' => 'International Computer Driving License ',
       'programme_id' => 'Icdl',
       'duration' =>'35',
        
       ]);
    }

}