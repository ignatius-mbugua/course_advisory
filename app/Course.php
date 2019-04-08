<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public $timestamps = false;

    //one to many relationship with Field model
    public function field(){
        return $this->belongsTo('App\Field');
    }

    public function subjects(){
        return $this->belongsToMany('App\Subject');
    }

    public function institutions(){
        return $this->belongsToMany('App\Institution');
    }

    public function colleges(){
        return $this->belongsToMany('App\College');
    }
}
