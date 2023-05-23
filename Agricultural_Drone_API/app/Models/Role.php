<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public static function store($reques, $id = null)
    {
        $user = $reques->only(['name']);
        $user = self::updateOrCreate(['id' => $id], $user);
        return $user;
    }

    public function users():HasMany{
        return $this->hasMany(User::class);
    }
}
