<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    public function apprentice(){
            return $this->hasOne('App\Models\apprentice');
    }
    public function training_center(){
            return $this->belongsTo('App\Models\training_center');
    }
    public function area(){
            return $this->belongsTo('App\Models\area');
    }
    public function teacher(){
            return $this->hasOne('App\Models\teacher');
    }
}
