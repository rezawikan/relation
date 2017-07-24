<?php

namespace App\Models\Polymorphic;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  // The attributes that are mass assignable.
  protected $fillable = ['content','user_id','commentable_id','commentable_type'];

  public function user()
  {
    return $this->belongsTo('App\Models\OneToOne\User');
  }

  public function commentable()
  {
    return $this->morphTo();
  }

}
