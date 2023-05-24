<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function store($request,$id=null)
    {
        $user = $request->only
        ([
            "name",
             "email",
             "password",
             "role_id",
        ]);
        $user = self ::updateOrCreate(["id"=>$id], $user);
        return $user;
    }
// ===================================Relationship=============================

    public function plans():HasMany{
        return $this->hasMany(Plan::class);
    }

    public function role():BelongsTo{
        return $this->belongsTo(Role::class);
    }

    public function instruction():BelongsToMany{
        return $this->belongsToMany(Drone::class,"instruction")->withTimestamps();
    }
}
