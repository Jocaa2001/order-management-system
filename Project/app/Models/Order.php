<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'price',
        'description'
    ];

    public function part(){
        return $this->belongsTo(Part::class); 
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class); 
    }

}
