<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Studio;

class Movie extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['name','date_released','studio_id'];

    public function studio()
    {
      return $this->belongsTo('App\Studio');
    }
}
