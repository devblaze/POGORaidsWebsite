<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pokemon extends Model
{
    protected $fillable = ['dex_id', 'name', 'tier', 'min_cp', 'max_cp', 'boosted_min_cp', 'boosted_max_cp'];

    public function raid(): HasMany
    {
        return $this->hasMany(Raid::class);
    }
}
