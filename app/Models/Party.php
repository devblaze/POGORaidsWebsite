<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Party extends Model
{
    protected $guarded = [];

    /**
     * A party belongs only to one raid.
     *
     * @return BelongsTo
     */
    public function raid(): BelongsTo {
        return $this->belongsTo(Raid::class);
    }
}
