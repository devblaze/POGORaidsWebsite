<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainer extends Model
{
    /**
     * If you don't want to check for the fields you can use: protected $guarded = [];
     *
     * @var string[]
     */
    protected $fillable = ['id', 'user_id', 'code', 'name', 'level', 'pokedex', 'team'];

    /**
     * A trainer belongs/must have one and only user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    /**
     * A trainer can have/be in many raids.
     *
     * @return HasMany
     */
    public function raid(): hasMany {
        return $this->hasMany(Raid::class);
    }

    /**
     * A trainer can have/be in many parties.
     *
     * @return HasMany
     */
    public function party(): hasMany {
        return $this->hasMany(Party::class);
    }
}
