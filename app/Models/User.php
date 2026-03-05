<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

        protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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
             'role'    => RoleEnum::class,
             'stripe_id',
             'trial_ends_at'
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === RoleEnum::ADMIN;
    }

    public function isClient(): bool
    {
        return $this->role === RoleEnum::CLIENT;
    }

    public function isSuscribed() : bool {
      if  ($this->role === RoleEnum::CLIENT and $this->trial_ends_at !== null) {
        return true;
      }  else { return false; }
    }

    public function taxe_profiles () {
        return $this->hasMany(TaxProfile::class);
    }
}
