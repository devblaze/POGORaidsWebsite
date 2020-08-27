<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Party extends Model
{
    protected $guarded = [];

    public function raid(): BelongsTo {
        return $this->belongsTo(Raid::class);
    }
}
