<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmes extends Model
{

    protected $fillable = [
        'name', 'programme_id', 'duration'
    ];
  
    public function courses()   {
       return $this->belongsToMany(Course::class ,'course_programme','programme_id');
   }

   public function registeredStudent() {
    return $this->hasMany(Student::class);
}
   

    use HasFactory;
}
