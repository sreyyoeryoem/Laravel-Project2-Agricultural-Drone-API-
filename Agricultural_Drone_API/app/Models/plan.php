<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'dateTime',
        'area',
        'spray_density',
        'user_id',
        'location_id'
    ];
    public static function store($reques, $id = null)
    {
        $plan = $reques->only([
        'name',
        'type',
        'dateTime',
        'area',
        'spray_density',
        'user_id',
        'location_id'
    ]);
        $plan = self::updateOrCreate(['id' => $id], $plan);
        return $plan;
    }

// ======================Relationship==========================

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function location():HasOne{
        return $this->hasOne(Location::class);
    }

    public function instruction():HasMany{
        return $this->HasMany(Instruction::class);
    }
}
