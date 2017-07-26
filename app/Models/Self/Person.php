<?php

namespace App\Models\Self;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name','birth_date','parent_id'];

    protected $dates = ['create_at','delete_at','birth_date'];

    public function parent()
    {
      return $this->belongsTo('App\Models\Self\Person', 'parent_id');
    }

    public function childs()
    {
      return $this->hasMany('App\Models\Self\Person','parent_id');
    }
}
