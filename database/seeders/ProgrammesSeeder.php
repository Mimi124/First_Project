<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        for ($i=0 ; $i < 200; $i++ ) {
       DB::table('programmes')->insert([
       'name' => 'International Computer Driving License '.$i,
       'programme_id' => 'Icdl'.@$i,
       'duration' =>rand(35,60),
       'created_at' => Carbon::now()
       ]);

       DB::table('programmes')->insert([
        'name' => 'Multimedia And Animation '.$i,
        'programme_id' => 'MAA'.@$i,
        'duration' =>rand(35,60),
        'created_at' => Carbon::now()
        ]);
    }

       }

    }