<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Raid extends Model
{
    protected $fillable = ['pokemon_id', 'trainer_id', 'name', 'tier', 'invites', 'hatched', 'weather_boost', 'end_time', 'seconds'];

    /**
     * Return all raids that are not over.
     *
     * @return Collection
     */
    public static function activeRaids(): Collection
    {
//        return self::where('end_time', '>', Carbon::now());
        return self::query()->whereRaw("end_time > '" . Carbon::now() . "'")->get();
    }

    /**
     * Delete a raid after checking it exists otherwise return 'false'.
     *
     * @param int $id
     * @return bool
     */
    public static function safeDelete(int $id): bool
    {
        $raid = static::find($id);
        if ($raid !== null){
            return $raid->delete();
        } else {
            return false;
        }
//        return ddd(static::findOrFail($id)->delete());
    }

    /**
     * Calculate the end time of a raid and return the Carbon date.
     *
     * @param float $minutes
     * @param bool $beforeHatch
     * @return Carbon
     */
    public static function finishDate(float $minutes, bool $beforeHatch): Carbon
    {
        if ($beforeHatch){
            $seconds = ($minutes * 60) + 3600;
        } else {
            $seconds = $minutes * 60;
        }
        $now = Carbon::now();
        return $now->addSeconds($seconds);
    }

    /**
     * Get the seconds left for a specific raid with ID = x.
     *
     * @param int $raidId
     * @return int
     */
    public static function getSecondsLeft(int $raidId): int
    {
        $endTime = Carbon::parse(static::where('id', $raidId)->value('end_time'));
        $now = Carbon::now();
        if ($now < $endTime){
            // The {now} is smaller than {endTime}
            return $endTime->diffInRealSeconds($now);
        } else {
            // The {now} is bigger than {endTime}
            return 0;
        }
    }

    /**
     * Returns a specific raid.
     *
     * @return string
     */
    public function path()
    {
        return route('raid_show', $this);
    }

    /**
     * A raid belongs to only one trainer. (It was created by one trainer.) (Since it has the foreign key we use 'BelongsTo')
     *
     * @return BelongsTo
     */
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    /**
     * A raid has one only 1 Pokemon. (It represents one pokemon.) (Since it has the foreign key we use 'BelongsTo')
     *
     * @return BelongsTo
     */
    public function pokemon(): BelongsTo
    {
        return $this->belongsTo(Pokemon::class, 'pokemon_id');
    }

    /**
     * A raid has many raid members.
     *
     * @return HasMany
     */
    public function raid_member(): HasMany
    {
        return $this->hasMany(RaidMember::class);
    }
}
