<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OneToOne\User;

class Preference extends Model
{

  /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

    protected $fillable = [
      'user_id','country', 'currency', 'subscribe_mailing_list'
    ];

    public function user()
    {
        return $this->belongsTo('App\OneToOne\User');
    }
}
