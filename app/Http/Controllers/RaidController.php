<?php

namespace App\Http\Controllers;

use App\Raid;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use PHPUnit\Framework\RiskyTestError;

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
     * @return View
     */
    public function create(): View
    {
        return view('raid.create');
    }

    /**
     * Create the new raid in the DB after validation.
     *
     * @return redirect
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
     * Show view to edit one of raids selected.
     *
     * @param Raid $raid
     * @return View
     */
    public function edit(Raid $raid): View
    {
        return view('raid.edit', compact('raid'));
    }

    /**
     * Update a raid from the DB after validation.
     *
     * @param Raid $raid
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Raid $raid) {
        $raid->update($this->validateRaid());
        return redirect($raid->path());
    }

    /**
     * Delete a raid from the DB with ID = x.
     *
     * @param int $id
     * @return Exception|string
     */
    public function destroy(int $id)
    {
        return Raid::safeDelete($id);
    }

    /**
     * Validate the raid fields from the user.
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
