<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OneToMany\Movie;

class Studio extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['name','founded_at'];

    public function movies()
    {
        return $this->hasMany('App\OneToMany\Movie');
    }
}
