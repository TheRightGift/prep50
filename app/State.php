<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'state',
    ];
    
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
