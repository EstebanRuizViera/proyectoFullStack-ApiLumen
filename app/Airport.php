<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model{
    public function flight()
    {
        return $this->hasMany('App\Flight');
    }
}