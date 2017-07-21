<?php

namespace App\Models\ManyToMany;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = ['name','founded_at'];

    public function movies()
    {
        return $this->hasMany('App\OneToMany\Movie');
    }
}
