<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description'];

    public function student(){
        return $this->belongsToMany(Student::class,'student_course');
    }
}
