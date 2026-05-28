<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

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
        'google_id'
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
    
    
    public function hasAccessTo(Content $content): bool
{
    if ($content->access_level === 'free') {
        return true;
    }

    if (!$this->subscribed()) {
        return false;
    }

    return match ($content->access_level) {
        'pro' => $this->plan === 'pro',
        'premium' => in_array($this->plan, ['premium']),
        default => false,
    };
}

public function savedContents()
{
    return $this->belongsToMany(
        Content::class,
        'saved_contents'
    )->withTimestamps();
}

protected static function booted()
{
    static::creating(function ($user) {
        if (User::count() === 0) {
            $user->role = RoleEnum::ADMIN;
        }
    });
}
}
