<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'lat',
        'lng',
    ];
    public static function store($request,$id=null)
    {
        $location = $request->only
        ([
            'lat',
            'lng',
        ]);
        $location = self ::updateOrCreate(["id"=>$id], $location);
        return $location;
    }

// ============================Relationship====================

    public function plan():BelongsTo{
        return $this->belongsTo(Plan::class);
    }

    public function drone():HasMany{
        return $this->hasMany(Drone::class);
    }
}

