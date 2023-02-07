<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'discription',
        'user_id'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function categoies(){
        return $this->belongsToMany(Category::class);
    }
}
