<?php

namespace App;

use Laravel\Passport\HasApiTokens;
<<<<<<< HEAD
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
=======
use Illuminate\Contracts\Auth\MustVerifyEmail;
>>>>>>> dcc76e5f13f6dc065c60611dd193cb7f4db85b25
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'firstname', 'othername', 'lastname', 'email', 'phone', 'dateReg', 'gender', 'img', 'totalCoinsAccrued', 'totalCurrentCoin', 'nextPayment', 'state_id', 'polytechnic_id', 'university_id', 'department_id', 'regNum'
=======
        'firstname', 'othername', 'lastname', 'email', 'password', 'phone', 'dateReg', 'gender', 'img', 'totalCoinsAccrued', 'totalCurrentCoin', 'nextPayment', 'state_id', 'polytechnic_id', 'university_id', 'department_id', 'regNum'
>>>>>>> dcc76e5f13f6dc065c60611dd193cb7f4db85b25
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function subjects()
    {
        return $this->hasMany('App\Subject');
        //return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function poly()
    {
        return $this->belongsTo(Polytechnic::class, 'polytechnic_id', 'id');
    }

    public function uni()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

}
