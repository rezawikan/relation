<?php

namespace App\Models\HasManyThrough;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name','genre'];

    public function albums()
    {
      return $this->hasMany('App\Models\HasManyThrough\Album');
    }

    public function songs()
    {
      return $this->hasManyThrough('App\Models\HasManyThrough\Song', 'App\Models\HasManyThrough\Album');
    }
}
