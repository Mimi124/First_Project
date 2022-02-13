<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           

        $faker = Faker::create();
        for ($i = 0; $i < 200; $i++){
        Student::create([
        'firstname'              =>  $faker->firstName(),
        'lastname'              =>  $faker->lastName(),
        'date_of_birth'   =>  $faker->date(),
        'student_id'   =>  $faker->numerify('##########'),
        'gender'           => $faker->randomDigit(),
        'contact'          =>  $faker->phoneNumber(),
        'programme_id'           =>  $faker->numberBetween(1, 200),
        

    ]);
    }
}

}
