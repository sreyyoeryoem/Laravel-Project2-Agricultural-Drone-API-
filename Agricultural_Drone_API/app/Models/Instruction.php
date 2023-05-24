<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
<<<<<<< HEAD
    
    use HasFactory;

    protected $fillable = [
        "Flight_time",
        "Maximum_altitude",
        "Maximum_speed",
        "Camera",
        'action',

    ];
=======
    use HasFactory;
    protected $fillable = [
        'action',
        'user_id',
        'drone_id'
    ];

>>>>>>> 7adf5ffc64a859c54691a21a772300843f868880
}
