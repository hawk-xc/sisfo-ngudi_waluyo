<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nik',
        'name',
        'email',
        'born_place',
        'born_date',
        'address',
        'phone',
        'gender',
        'relationship_name',
        'password',
        'raw_password',
        'role_id',
        'lansia_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // relasi ke Lansia = 1 to M
    public function lansias()
    {
        return $this->hasMany(Lansia::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function checkRole()
    {
        return $this->role_id;
    }
}
