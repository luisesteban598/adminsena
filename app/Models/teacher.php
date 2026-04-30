<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    public function area(){
            return $this->belongTo('App\Models\area');
    }
    public function training_center(){
            return $this->belongTo('App\Models\training_center');
    }

    public function course(){
            return $this->hasOne('App\Models\course');
    }
}
