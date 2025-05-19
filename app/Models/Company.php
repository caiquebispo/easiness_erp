<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $guarded = [];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'company_users');
    }
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'company_id');
    }
}
