<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainer extends Model
{
    /**
     * If you don't want to check for the fields you can use: { protected $guarded = []; }
     *
     * @var string[]
     */
    protected $fillable = ['id', 'user_id', 'code', 'name', 'level', 'pokedex', 'team'];

    /**
     * Return the ID of a trainer based on their name.
     *
     * @param String $name
     * @return int
     */
    public static function getId(String $name): int
    {
        return self::where('name', $name)->value('id');
    }
    /**
     * Returns a specific Trainer.
     *
     * @return string
     */
    public function path()
    {
        return route('trainer_show', $this);
    }

    /**
     * A trainer belongs/must have one and only user. (Since it has the foreign key we use 'BelongsTo')
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
