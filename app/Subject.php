<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'subj',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }
}
