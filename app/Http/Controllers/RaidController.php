<?php

namespace App\Http\Controllers;

use App\Raid;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class RaidController extends Controller
{
    public function index(): View {
        // Shows a list of all items
        $raids = Raid::latest()->get();
        return view('raid.index', ['raids' => $raids]);
    }

    public function show(Raid $raid): View {
        // Shows one item of that list
        return view('raid.show', ['raid' => $raid]);
    }

    public function create(): View {
        // Shows a view to create a new item
        return view('raid.create');
    }

    public function store(){
        // Persist the new item
        Raid::create($this->validateRaid() + [
                'trainer_id' => auth()->user()->trainer->id,
                'weather_boost' => (bool)\request()->get('weather_boost'),
                'hatched' => (bool)\request()->get('hatched'),
                'seconds' => \request()->get('minutes') * 60,
            ]);
        return redirect(route('raid_index'));
//        return ddd($this->validateRaid());
    }

    public function edit(Raid $raid): View{
        // Edit one item from the list
        return view('raid.edit', compact('raid'));
    }

    public function update(Raid $raid){
        // Persist the edited item
        $raid->update($this->validateRaid());
        return redirect($raid->path());
    }

    public function destroy(Raid $raid): View{
        // Delete the item
        return view('raid.index');
    }

    /**
     * Validate the raid fields.
     *
     * @return array
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
