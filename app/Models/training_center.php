<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training_center extends Model
{
          protected $fillable = [
        'name',
        'location',
        'imagen_url',
        'imagen_public_id',
    ];
    use HasFactory;
    public function course(){
            return $this->hasMany('App\Models\course');
    }
    public function teacher(){
            return $this->hasMany('App\Models\teacher');
    }
    
}
