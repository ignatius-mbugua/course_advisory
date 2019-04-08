<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','gender', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //many to many relationship with subject
    public function subjects(){
        return $this->belongsToMany('App\Subject');
    }

    //one to one relationship with aggregate
    public function aggregate(){
        return $this->hasOne('App\Aggregate');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function feedback(){
        return $this->hasOne('App\Feedback');
    }
}
