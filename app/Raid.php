<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class Raid extends Model
{
    protected $fillable = ['trainer_id', 'name', 'level', 'party_size', 'status', 'weather_boost', 'finish_time', 'icon_name'];

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

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    public function party(): HasMany {
        return $this->hasMany(Party::class);
    }
}
