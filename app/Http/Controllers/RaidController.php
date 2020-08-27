<?php

namespace App\Http\Controllers;

use App\Raid;
use Illuminate\Http\Request;
//use Illuminate\View\View;
use Illuminate\Contracts\Support\Renderable;

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
        Raid::create($this->validateRaid());
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
     * @return array
     */
    protected function validateRaid(): array
    {
        return request()->validate([
/*            'username' => ['required', 'min:3'],
            'trainer_id' => ['required', 'min:12', 'max:12'],*/
            'trainer_id' => ['required'],
            'name' => ['required', 'min:3', 'max:12']
        ]);
    }
}
