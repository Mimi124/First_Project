<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('date_of_birth');
            $table->string('student_id')->unique();
            $table->string('gender');
            $table->string('contact');
            $table->unsignedBigInteger('programme_id');
            

            $table->foreign('programme_id')->references('id')->on('programmes');
        });    
          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
