<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    public function mycourse()
    {
        return $this->hasMany('App\Models\courses','id','course_id');
    }
    
    use HasFactory;
}
