<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserStatus;
use App\Traits\Auditable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar, MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens, Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'email_verified_at',
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
            'status' => UserStatus::class,
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        //return ($this->status === UserStatus::Active) && $this->with('roles');
        return $this->status === UserStatus::Active;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->gravatar_url;
    }

    public function getGravatarUrlAttribute(): string
    {
        $hash = md5(strtolower(trim($this->email)));
        return "https://www.gravatar.com/avatar/{$hash}?s=200&d=wavatar&r=r";
    }

    public function isAdmin(): bool {
        return auth()->user()->hasAnyRole(['Admin', 'Super Admin']);
    }

    public function isSuperAdmin(): bool {
        return auth()->user()->hasRole('Super Admin');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function payments(): HasMany {
        return $this->hasMany(Payment::class);
    }

    public function customers(): HasMany {
        return $this->hasMany(Customer::class);
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

    public function categories(): HasMany {
        return $this->hasMany(Category::class);
    }

    public function brands(): HasMany {
        return $this->hasMany(Brand::class);
    }
}
