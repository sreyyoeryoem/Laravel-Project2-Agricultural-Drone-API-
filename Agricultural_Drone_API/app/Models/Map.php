<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        "image_type",
        'quality_image',
        'drone_id',
        'farm_id',
    ];

    public static function store($reques, $id = null)
    {
        $map = $reques->only([
            "image_type",
            'quality_image',
            'drone_id',
            'farm_id',
        ]);
        $map = self::updateOrCreate(['id' => $id], $map);
        return $map;
    }

    public function farm():BelongsTo{
        return $this->belongsTo(Farm::class);
    }

    public function drone():HasOne{
        return $this->hasOne(Drone::class);
    }
}
