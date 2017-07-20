<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Studio extends Model
{
    public $timestamps = false;

    protected $fillable = ['name','founded_at'];

    public function movies()
    {
        return $this->hasMany('App\Movie');
    }
}
