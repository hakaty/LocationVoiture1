<?php

namespace App\Models;

use App\Models\Rental;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;
    protected $fillable = [
        'photo',
        'brand',
        'model',
        'fuel_type',
        'price',
        'gearbox',
        'available'
    ];

    public function Rental(){
        return $this->belongsTo(Rental::class);
    }
}
