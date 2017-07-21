<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Model;

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
