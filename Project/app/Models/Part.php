<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'price',
        'description'
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class); 
    }

    public function orders(){
        return $this->hasMany(Order::class); 
    }

    public function category(){
        return $this->belongsTo(category::class); 
    }

}
