<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;
    public function courses(){
            return $this->hasMany('App\Models\course');
    }
    public function teachers(){
            return $this->hasMany('App\Models\teacher');
    }
}
