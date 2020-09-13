<?php

namespace App\Http\Controllers;

use App\Raid;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Shows a list of all items
     */
    public function index(): View
    {
//        $raids = Raid::latest()->get();
        return view('raid.index');
    }

    /**
     * Shows one item of that list
     *
     * @param Raid $raid
     * @return View
     */
    public function show(Raid $raid): View
    {
        return view('raid.show', ['raid' => $raid]);
    }

    /**
     * Shows a view to create a new item
     */
    public function create(): View
    {
        return view('raid.create');
    }

    /**
     * Persist the new item
     */
    public function store() {
        Raid::create($this->validateRaid() + [
                'trainer_id' => auth()->user()->trainer->id,
                'weather_boost' => (bool)\request()->get('weather_boost'),
                'hatched' => (bool)\request()->get('hatched'),
                'seconds' => \request()->get('minutes') * 60,
                'end_time' => Raid::finishDate(\request()->get('minutes'), (bool)\request()->get('hatched'))
            ]);
        return redirect(route('raid_index'));
    }

    /**
     * Edit one item from the list
     *
     * @param Raid $raid
     * @return View
     */
    public function edit(Raid $raid): View
    {
        return view('raid.edit', compact('raid'));
    }

    /**
     * Persist the edited item
     *
     * @param Raid $raid
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Raid $raid) {
        $raid->update($this->validateRaid());
        return redirect($raid->path());
    }

    /**
     * Delete the an item from the list
     *
     * @param Raid $raid
     * @return Exception|string
     */
    public function destroy(Raid $raid)
    {
        return $raid->safeDelete($raid);
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
