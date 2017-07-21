<?php

namespace App\Models\HasManyThrough;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;


    // The attributes that are mass assignable.
    protected $fillable = ['ablum_id', 'title', 'length'];

    public function album()
    {
        return $this->belongsTo('App\Models\HasManyThrough\Album');
    }
}
