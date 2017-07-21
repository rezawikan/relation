<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = ['course_id','student_id'];
}
