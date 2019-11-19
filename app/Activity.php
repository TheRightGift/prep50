<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'active', 'objective_id', 'dateCompleted', 'progress', 'sortprogress', 'user_id', 
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class, 'objective_id', 'id');
    }

    public function userSubject()
    {
        return $this->belongsTo(UserSubject::class, 'userSubject_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Objective::class, 'user_id', 'id');
    }

    //get Topic Through Obj
    public function getTopicAttribute()
    {
        return $this->objective->topic;
    }
}
