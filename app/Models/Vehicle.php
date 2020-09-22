<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes for model vehicle
     * @var array
     *
     */
    protected $fillable = [
        'car_license_plate',
        'model',
        'year',
        'brand',
        'chassi'
    ];

    /**
     * The attributes for hidden
     * @var array
     *
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
