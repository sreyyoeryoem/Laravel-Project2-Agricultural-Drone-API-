<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Map extends Model
{
    use HasFactory;
    protected $fillable = [
        "image",
        'province',
        "drone_id",
        "farm_id",
    ];

    public static function store($reques, $id = null)
    {
        $map = $reques->only([
            "image",
            'province',
            'drone_id',
            'farm_id',
        ]);
        $map = self::updateOrCreate(['id' => $id], $map);
        return $map;
    }

    // ===============================relationships===============================

    public function farm():BelongsTo{
        return $this->belongsTo(Farm::class);
    }

    public function drone():HasOne{
        return $this->hasOne(Drone::class);
    }
}
