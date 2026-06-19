<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
          protected $fillable = [
        'course_number',
        'day',
        'area_id',
        'training_center_id',

    ];


    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function trainingCenter(){
        return $this->belongsTo('App\Models\TrainingCenter');
    }
    use HasFactory;
    public function apprentice(){
            return $this->hasOne('App\Models\apprentice');
    }
    
   
    public function teacher(){
            return $this->hasOne('App\Models\teacher');
    }
}
