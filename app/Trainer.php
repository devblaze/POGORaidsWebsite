<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainer extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function raid(): hasMany {
        return $this->hasMany(Raid::class);
    }

    public function party(): hasMany {
        return $this->hasMany(Party::class);
    }
}
