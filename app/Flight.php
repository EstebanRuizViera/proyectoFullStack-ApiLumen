<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model{
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function airport()
    {
        return $this->belongsTo('App\Airport');
    }

}