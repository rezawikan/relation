<?php

namespace App\Models\ManyToManyPolymorphic;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ['title','content'];

    public function tags()
    {
      return $this->morphToMany('App\Models\ManyToManyPolymorphic\Tag','taggable');
    }
}
