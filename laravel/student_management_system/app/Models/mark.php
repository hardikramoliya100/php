<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mark extends Model
{
    use HasFactory;
    public function mystudent()
    {
        return $this->hasMany('App\Models\students','id','student_id');
    }
}
