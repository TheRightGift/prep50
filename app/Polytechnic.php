<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polytechnic extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'poly',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
