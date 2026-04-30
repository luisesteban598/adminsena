<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class computer extends Model
{
        use HasFactory;
        public function apprentice(){
            return $this->hasOne('App\Models\apprentice');
    }
}