<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone_plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'drone_id',
        "plan_id",
    ];
}
