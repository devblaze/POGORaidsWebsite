<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;

class Pokemon extends Model
{
    protected $fillable = ['dex_id', 'name', 'tier', 'min_cp', 'max_cp', 'boosted_min_cp', 'boosted_max_cp'];

    /**
     * Search that sends back a list of all raids depending on their name.
     *
     * @param String $name
     * @return Collection
     */
    public static function searchByName(String $name): Collection
    {
        $id = self::query()->whereRaw("UPPER(name) LIKE '%" . strtoupper($name) . "%'")->value('id');
        return self::find($id)->raid()->latest()->get();

        //        return static::query()->where('name','LIKE','%'.$name.'%');
//        return self::query()->whereRaw("UPPER(name) LIKE '%". strtoupper($name) ."%'")->latest();

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

    public function raid(): HasMany
    {
        return $this->hasMany(Raid::class);
    }
}
