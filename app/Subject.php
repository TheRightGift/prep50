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

    public function objectives() {
        return $this->hasManyThrough(
            'App\Objective', 
            'App\Topic',
            'subj_id', //subject Id in Topics TB
            'id', //id for subjects TB
            'id' //id for topics TB
        );
    }
}
