<?php

namespace App\Models\OneToOne;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{

    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = [
      'user_id','country', 'currency', 'subscribe_mailing_list'
    ];

    public function user()
    {
        return $this->belongsTo('App\OneToOne\User');
    }
}
