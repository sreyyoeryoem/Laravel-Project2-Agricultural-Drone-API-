<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'date_time',
        'area',
        'spray_density',
        'user_id',
        'location_id'
    ];

// ======================Relationship==========================
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function location():HasOne{
        return $this->hasOne(Location::class);
    }
}
