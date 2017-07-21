<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OneToMany\Studio;

class Movie extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['name','date_released','studio_id'];

    public function studio()
    {
      return $this->belongsTo('App\OneToMany\Studio');
    }
}
