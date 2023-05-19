<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
    ];

    // public static function store($reques, $id = null)
    // {
    //     $user = $reques->only(['name','user_id']);
    //     $user = self::updateOrCreate(['id' => $id], $user);
    //     return $user;
    // }
}
