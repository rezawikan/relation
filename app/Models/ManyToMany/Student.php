<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['name','date_of_birth','gender'];

    public function courses()
    {
        return $this->belongsToMany('App\ManyToMany\Course');
        // $this->belongsToMany('App\Course')->withTimestamps()->withPivot('nama_kolom')
    }
}
