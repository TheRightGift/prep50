<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubject extends Model
{
    //The attributes that are mass assignable.
    protected $fillable = [
        'user_id', 'objective_id'
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class, 'objective_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
