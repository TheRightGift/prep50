<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'dept',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
