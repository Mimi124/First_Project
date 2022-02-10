<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'date_of_birth', 'student_id','gender',
    'contact', 'programme_id'
    ];
    public function registeredProgramme() {
        // specify the foreign key name because the method name does not follow
        // convention
        return $this->belongsTo(Programmes::class,'programme_id');
    }
public function getFullnameAttribute()   {
    return $this->firstname. ' ' . $this->lastname;
}

public function getAgeAttribute(){
   return Carbon::parse($this->date_of_birth)->diffInYears(Carbon::now());

}
    use HasFactory;
}
