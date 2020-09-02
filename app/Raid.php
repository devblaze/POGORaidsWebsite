<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class Raid extends Model
{
    protected $fillable = ['trainer_id', 'name', 'tier', 'invites', 'hatched', 'weather_boost', 'seconds'];


/*    public function calculateTime(seconds){
//        $end_time = datetime(minutes) + created_at;
//        trim $end_time -> (minutes * 60) + seconds;
//
    }*/
    /**
     * A quick search that send back a list of all raids depending on their name.
     *
     * @param String $name
     * @return Builder
     */
    public static function searchByName(String $name): Builder
    {
//        return static::query()->where('name','LIKE','%'.$name.'%');
        return self::query()->whereRaw("UPPER(name) LIKE '%". strtoupper($name) ."%'");

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
