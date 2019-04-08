<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    //
    public $timestamps = false;

    public function courses(){
        return $this->belongsToMany('App\Course');
    }
}
