<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'topic', 'JW', 'subj_id'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subj_id', 'id');
    }

    public function objectives()
    {
        return $this->hasMany('App\Objective');
    }
}
