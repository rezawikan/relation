<?php

namespace App\Models\Polymorphic;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // Indicates if the model should be timestamped.
  public $timestamps = false;

  // The attributes that are mass assignable.
  protected $fillable = ['title','filename','user_id'];

  public function user()
  {
    return $this->belongsTo('App\Models\OneToOne\User');
  }

  public function comments()
  {
    return $this->morphMany('App\Models\Polymorphic\Comment', 'commentable');
  }
}
