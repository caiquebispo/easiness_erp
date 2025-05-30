<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    protected $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'profile_users');
    }
}
