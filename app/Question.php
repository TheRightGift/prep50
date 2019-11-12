<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'question', 'optionA', 'optionB', 'optionC', 'optionD', 'answer', 'fileName', 'passage', 'quesYear', 'quesYearNum', 'explanation', 'objective_id'
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class, 'objective_id', 'id');
    }

    //get Topic Through Obj
    public function getTopicAttribute()
    {
        return $this->objective->topic;
    }
}
