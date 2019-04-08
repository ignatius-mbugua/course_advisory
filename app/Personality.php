<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personality extends Model
{
    //

    public function fields(){
        return $this->belongsToMany('App\Field');
    }

}
