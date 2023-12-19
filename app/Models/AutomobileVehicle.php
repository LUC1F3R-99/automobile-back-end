<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomobileVehicle extends Model
{
    use HasFactory;

    protected $table = 'automobile_vehicles'; // Replace 'your_table_name' with the actual table name in your database

    protected $fillable = [
        'vehicleNumber',
        'customerId',
        'make',
        'year',

    ];
}
