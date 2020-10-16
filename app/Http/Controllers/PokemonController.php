<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PokemonController extends Controller
{
    /**
     * Return just a view for pokemon's for now.
     *
     * @return View
     */
    public function index(): View
    {
        return view('pokemon.index');
    }

    public function show()
    {
        //
    }

    /**
     * Return just the create view.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pokemon.create');
    }

    public function store()
    {
        Pokemon::create($this->validatePokemon());
        return redirect(route('raid_index'));
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }

    public function validatePokemon(): array
    {
        return \request()->validate([
            'dex_id' => ['required', 'min:1', 'max:600'],
            'name' => ['required'],
            'tier' => ['required', 'between:1,6'],
            'min_cp' => ['required'],
            'max_cp' => ['required'],
            'boosted_min_cp' => ['required'],
            'boosted_max_cp' => ['required'],
            'pokemon_image' => ['image', 'mines:jpg,png', 'max:2048']
        ]);
    }
}
