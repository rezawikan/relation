<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    protected $fillable = ['name','date_of_birth','gender'];

    public function courses()
    {
        return $this->belongsToMany('App\Course');
        // $this->belongsToMany('App\Course')->withTimestamps()->withPivot('nama_kolom')
    }
}
