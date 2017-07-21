<?php

namespace App\Models\HasManyThrough;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['ablum_id', 'title', 'length'];

    public function album()
    {
      return $this->belongsTo('App\Models\HasManyThrough\Album');
    }
}
