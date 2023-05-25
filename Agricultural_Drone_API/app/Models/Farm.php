<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'province',
    ];
    public static function store($request,$id=null)
    {
        $farm = $request->only
        ([
            'province' 
        ]);
        $farm = self ::updateOrCreate(["id"=>$id], $farm);
        return $farm;
    }

    // =============================relationships =============================
    public function map():HasOne{
        return $this->hasOne(Map::class);
    }
}
