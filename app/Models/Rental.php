<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    /** @use HasFactory<\Database\Factories\RentalFactory> */
    use HasFactory;

    
    protected $fillable = [
        'rental_date',
        'return_date',
        'price',
        'user_id',
        'car_id',
        'car_brand',
        'car_photo',
        'status',
        
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
