<?php

namespace App\Http\Controllers;

use App\Raid;
use App\Pokemon;

class ApiController extends Controller
{
    /**
     * Get a list of the all raids first the latest.
     *
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Raid::activeRaids();
//        return Raid::latest()->get();
    }

    /**
     * Check if the request is empty if it's not use the searchByName otherwise get all raids latest the first.
     *
     */
    public function searchByName()
    {
        $request = \Request::get('q');
        if ($request !== null){
            return Pokemon::searchByName($request);
        } else {
            return Raid::latest()->get();
        }
    }

    /**
     * Request the model to search for the raid and return the seconds left.
     *
     * @return int
     */
    public function getRaidSeconds(): int
    {
        $request = \Request::get('id');
        return Raid::getSecondsLeft($request);
    }

    /**
     * Returns all available pokemon's.
     *
     */
    public function getPokemon()
    {
        return Pokemon::get(['dex_id', 'name', 'tier', 'min_cp', 'max_cp', 'boosted_min_cp', 'boosted_max_cp']);
    }
}
