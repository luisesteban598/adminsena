<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apprentice extends Model
{
        use HasFactory;
        public function computer(){
            return $this->belongTo('App\Models\computer');
    }
        public function course(){
                return $this->belongTo('App\Models\course');
    }
}