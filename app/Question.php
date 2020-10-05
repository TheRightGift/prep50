<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'question', 'optionA', 'optionB', 'optionC', 'optionD', 'answer', 'fileName','quesimg', 'passage', 'quesYear', 'quesYearNum', 'explanation', 'objective_id', 'topic_id'
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class, 'objective_id', 'id');
    }
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    //get Topic Through Obj
    public function getTopicAttribute()
    {
        return $this->objective->topic;
    }
}
