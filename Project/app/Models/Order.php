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

    public function parts(){
        return $this->belongsTo(Part::class); 
    }

    public function suppliers(){
        return $this->belongsTo(Supplier::class); 
    }

}
