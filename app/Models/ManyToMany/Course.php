<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['title','units','room'];

    public function students()
    {
        return $this->belongsToMany('App\ManyToMany\Student');
    }
}
