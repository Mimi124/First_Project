<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'course_id', 'duration'
    ];

    public function programmes()   {
       return  $this->belongsToMany(Programmes::class,'course_programme','course_id','programme_id');
    }
    

    use HasFactory;
}
