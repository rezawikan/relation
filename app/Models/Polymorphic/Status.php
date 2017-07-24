<?php

namespace App\Models\Polymorphic;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\OneToOne\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Polymorphic\Comment', 'commentable');
    }
}
