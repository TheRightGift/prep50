<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'title', 'creditLoad', 'topic_id', 'subject_id'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function tutorials()
    {
        return $this->hasMany('App\Tutorial');
    }
}
