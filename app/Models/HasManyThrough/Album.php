<?php

namespace App\Models\HasManyThrough;

use Illuminate\Database\Eloquent\Model;
use App\Models\HasManyThrough\Artist;
use App\Models\HasManyThrough\Song;


class Album extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['artist_id','title','released'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function artists()
    {
        return $this->hasMany(Song::class);
    }
}
