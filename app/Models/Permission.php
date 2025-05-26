<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create($toArray)
 */
class Permission extends Model
{
    protected $guarded = [];

    public function profiles() : BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'permission_profiles');
    }
}
