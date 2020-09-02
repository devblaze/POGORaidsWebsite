<?php

namespace App\Http\Controllers;

use App\Raid;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
//use Illuminate\View\View;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Validation\ValidationException;

class RaidController extends Controller
{
    public function index(): Renderable {
        // Shows a list of all items
        $raids = Raid::latest()->get();
        return view('raid.index', ['raids' => $raids]);
    }

    public function show(Raid $raid): Renderable {
        // Shows one item of that list
        return view('raid.show', ['raid' => $raid]);
    }

    public function create(): Renderable {
        // Shows a view to create a new item
        return view('raid.create');
    }

    public function store(){
        // Persist the new item
        $test = [
            'trainer_id' => auth()->user()->trainer->id,
            'weather_boost' => (bool)\request()->get('weather_boost'),
            'hatched' => (bool)\request()->get('hatched'),
        ] + $this->validateRaid();
        Raid::create($test);
        return redirect(route('raid_index'));
    }

    public function edit(Raid $raid): Renderable{
        // Edit one item from the list
        return view('raid.edit', compact('raid'));
    }

    public function update(Raid $raid){
        // Persist the edited item
        $raid->update($this->validateRaid());
        return redirect($raid->path());
    }

    public function destroy(Raid $raid): Renderable{
        // Delete the item
        return view('raid.index');
    }

    /**
     * Validate the raid field.
     *
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateRaid(): array
    {
        return \request()->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'tier' => ['required', 'between:1,5'],
            'invites' => ['required', 'between:1,20'],
            'minutes' => ['required', 'min:2', 'max:2'],
        ],
            [
                'name.required' => 'You must select a Pokemon.'
            ]
        );
    }
}
