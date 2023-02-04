<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'name', 'detail'
    ];

    public function setDetailAttribute($value)
    {
        return $this->attributes['detail'] = json_encode($value);
    }

    public function getDetailAttribute($value)
    {
        return $this->attributes['detail'] = json_decode($value);
    }
}