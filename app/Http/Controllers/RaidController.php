<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Raid;
use App\Models\Pokemon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class RaidController extends Controller
{
    /**
     * Used for testing purposes only.
     */
    public function test(): string
    {
        return Raid::calculateTimeLeft(52);
//        return ddd($this->validateRaid());
    }

    /**
     * Return just the view index.
     *
     * @return View
     */
    public function index(): View
    {
//        $raids = Raid::latest()->get();
        return view('raid.index');
    }

    /**
     * Shows info about the selected raid.
     *
     * @param Raid $raid
     * @return View
     */
    public function show(Raid $raid): View
    {
        return view('raid.show', ['raid' => $raid]);
    }

    /**
     * Returns a view to create a new raid.
     *
     * @return Application|RedirectResponse|Redirector|View
     */
    public function create()
    {
//        PokemonController::index();
        if (auth()->user()->trainer === null){
            return redirect(route('trainer_create'))->withErrors(['errors' => 'You need to add at least one registered Trainer!']);
        }
        $pokemon_data = Pokemon::orderBy('tier', 'desc')->get();
        return view('raid.create', ['pokemons' => $pokemon_data]);
    }

    /**
     * Create the new raid in the DB after validation.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
//        Party::create();
        Raid::create($this->validateRaidFields($request) + [
                'trainer_id' => auth()->user()->trainer->id,
                'pokemon_id' => $request->get('pokemon_id'),
                'weather_boost' => (bool)$request->get('weather_boost'),
                'hatched' => (bool)$request->get('hatched'),
//                'seconds' => \request()->get('minutes') * 60,
                'end_time' => Raid::finishDate($request->get('minutes'), (bool)$request->get('hatched'))
            ]);
        return redirect(route('raid_index'));
    }

    /**
     * Show view to edit one of raids selected.
     *
     * @param Raid $raid
     * @return View
     */
    public function edit(Raid $raid): View
    {
//        $pokemons = Pokemon::get('id', 'name', 'tier');
        $pokemons = Pokemon::all();
        return view('raid.edit', compact('raid', 'pokemons'));
    }

    /**
     * Update a raid from the DB after validation.
     *
     * @param Raid $raid
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Raid $raid, Request $request) {
        $raid->update($this->validateRaidFields($request));
        return redirect($raid->path());
    }

    /**
     * Delete a raid from the DB with a specific ID.
     *
     * @param int $id
     * @return Exception|string
     */
    public function destroy(int $id)
    {
        if (auth()->user()->id === $id){
            return Raid::safeDelete($id);
        } elseif (auth()->user()->AccessLevel->label === "admin") {
            return Raid::safeDelete($id);
        }
        return view('unauthorized');
    }

    /**
     * Validate the raid fields from the user.
     *
     * @param Request $request
     * @return array
     */
    protected function validateRaidFields(Request $request): array
    {
        return $request->validate([
//            'name' => ['required'],
            'invites' => ['required', 'between:1,20'],
            'minutes' => ['required', 'min:2', 'max:2'],
        ]/*,
            [
                'name.required' => 'You must select a Pokemon.'
            ]*/
        );
    }
}
