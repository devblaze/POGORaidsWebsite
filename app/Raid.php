<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class Raid extends Model
{
    protected $fillable = ['trainer_id', 'name', 'tier', 'invites', 'hatched', 'weather_boost', 'end_time', 'seconds'];

    public static function safeDelete(Raid $raid)
    {
        try {
            $raid->delete();
            return "Success!";
        } catch (\Exception $ex) {
            return $ex;
        }
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
     * Search that sends back a list of all raids depending on their name.
     *
     * @param String $name
     * @return Builder
     */
    public static function searchByName(String $name): Builder
    {
//        return static::query()->where('name','LIKE','%'.$name.'%');
        return self::query()->whereRaw("UPPER(name) LIKE '%". strtoupper($name) ."%'")->latest();

        /*        return raid()->where(function ($query){
                    $query->where('name','LIKE',"%$name%");
                });*/

        /*        if ($search = \Request::get('q')){
                    $raids = raid()->where(static function ($query) use ($search){
                        $query->where('name','LIKE',"%$search%");
                    })->paginate(6);
                } else {
                    $raids = raid()->latest()->paginate(6);
                }

                return $raids;*/
    }

    public function path(){
        return route('raid_show', $this);
    }

    /**
     * A raid belongs to only one trainer. (It was created by one trainer.)
     *
     * @return BelongsTo
     */
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    /**
     * Needs more thinking for a better solution.
     *
     * @return HasMany
     */
    public function party(): HasMany {
        return $this->hasMany(Party::class);
    }
}
