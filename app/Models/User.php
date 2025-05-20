<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [];

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
    public function profiles(): BelongsToMany
    {

        return $this->belongsToMany(Profile::class);
    }
    public function hasPermission(Module $module): bool
    {

        return $this->hasAnyProfiles($module->profiles);
    }
    public function hasAnyProfiles($profiles): bool
    {
        if(is_array($profiles) || is_object($profiles)){
            return !!$profiles->intersect($this->profiles)->count();
        }
        return $this->profiles->contains('name', $profiles->name);
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_users');
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'images');
    }
}
