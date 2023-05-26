<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'action',
        'instructions',
        'plan_id',
        'drone_id'
    ];


    // ===============================relationships========================
    
    public function drone():BelongsTo{
        return $this->belongsTo(Drone::class);
    }
}
