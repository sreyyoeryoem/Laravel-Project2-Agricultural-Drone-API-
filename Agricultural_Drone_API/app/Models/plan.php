<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date_time',
        'area',
        'spray_density',
        'user_id',
        'location_id'
    ];

    
}
