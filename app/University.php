<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'univ',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
