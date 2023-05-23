<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    
    use HasFactory;

    protected $fillable = [
        "Flight_time",
        "Maximum_altitude",
        "Maximum_speed",
        "Camera",
        'action',

    ];
}
