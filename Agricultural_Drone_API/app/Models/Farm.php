<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
      
    ];
    public static function store($request,$id=null)
    {
        $farm = $request->only
        ([
            'name',
        
        ]);
        $farm = self ::updateOrCreate(["id"=>$id], $farm);
        return $farm;
    }

    public function maps():HasMany{
        return $this->hasMany(Map::class);
    }
}
