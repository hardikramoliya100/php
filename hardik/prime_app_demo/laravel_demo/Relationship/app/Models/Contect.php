<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contect extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }
}
