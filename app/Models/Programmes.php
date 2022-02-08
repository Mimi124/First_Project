<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmes extends Model
{

    protected $fillable = [
        'name', 'programme_id', 'duration'
    ];

    use HasFactory;
}
