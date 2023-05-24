<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
