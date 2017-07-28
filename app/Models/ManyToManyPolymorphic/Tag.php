<?php

namespace App\Models\ManyToManyPolymorphic;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name'];

    protected $timestamps = false;

    public function articles()
    {
      return $this->morphByMany('App\Models\ManyToManyPolymorphic\Article','taggable');
    }

    public function videos()
    {
      return $this->morphByMany('App\Models\ManyToManyPolymorphic\Video','taggable');
    }
}
