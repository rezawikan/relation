<?php

namespace App\Models\HasManyThrough;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['artist_id','title','released'];

    public function artist()
    {
        return $this->belongsTo('App\Models\HasManyThrough\Artist');
    }

    public function artists()
    {
        return $this->hasMany('App\Models\HasManyThrough\Song');
    }
}
