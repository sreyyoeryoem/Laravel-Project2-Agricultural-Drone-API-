<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        "drone_id",
        'name',
        'battery',
        'payload',
        'Maximum_altitude',
        'Maximum_speed',
        'location_id',
    ];

    public static function store($reques, $id = null)
    {
        $drone = $reques->only([
            "drone_id",
            'name',
            'battery',
            'payload',
            'Maximum_altitude',
            'Maximum_speed',
            'location_id',
        ]);
        $drone = self::updateOrCreate(['id' => $id], $drone);
        return $drone;
    }
    public function locations():HasMany{
        return $this->hasMany(Location::class);
    }

    public function drone_plan():BelongsToMany{
        return $this->belongsToMany(Plan::class,"drone_plan")->withTimestamps();
    }
  
    public function instruction():BelongsToMany{
        return $this->belongsToMany(User::class,"instruction")->withTimestamps();
    }

    public function map():BelongsTo{
        return $this->belongsTo(Map::class);
    }

}
