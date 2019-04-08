<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public $timestamps = false;

    //many to many relationship with subject
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function courses(){
        return $this->belongsToMany('App\Course');
    }

    public function indices(){
        return $this->belongsToMany('App\Index');
    }
}
