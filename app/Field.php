<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public $timestamps = false;
    
    //many to many relationship with Personality model
    public function personalities(){
        return $this->belongsToMany('App\Personality');
    }

    //one to many relationship with Course model
    public function courses(){
        return $this->hasMany('App\Course');
    }
}
