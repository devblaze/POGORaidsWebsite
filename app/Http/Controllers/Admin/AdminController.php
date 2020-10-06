<?php

namespace App\Http\Controllers\Admin;

use App\BugReport;
use App\User;
use App\AccessLevel;
use App\Trainer;
use App\Raid;
use App\Pokemon;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('access');
    }

    /**
     * Display the view for the Admin panel.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.index');
    }

    public function users(): View
    {
        $users = User::paginate(20);
        return view('admin.users', ['users' => $users]);
    }
    public function userEdit(User $user): View
    {
        return view('admin.userEdit', compact('user'));
    }
    public function userUpdate(User $user)
    {
        $user->where('id', $user->id)->update([
            'username' => \request()->get('username'),
            'email' => \request()->get('email'),
            'access_level_id' => \request()->get('accessLevel')
        ]);
        return redirect(route('admin_test'));
    }

    public function accessLevels(): View
    {
        $levels = AccessLevel::paginate(20);
        return view('admin.accesslevels', ['levels' => $levels]);
    }
    public function trainers(): View
    {
        $trainers = Trainer::paginate(20);
        return view('admin.trainers', ['trainers' => $trainers]);
    }
    public function raids(): View
    {
        $raids = Raid::paginate(20);
        return view('admin.raids', ['raids' => $raids]);
    }
    public function pokemon(): View
    {
        $pokemons = Pokemon::paginate(20);
        return view('admin.pokemon', ['pokemons' => $pokemons]);
    }

    public function bugreports()
    {
        $bug_reports = BugReport::paginate(20);
        return view('admin.bugreports', ['bugreports' => $bug_reports]);
    }

    public function unauthorized() {
        return view('admin.unauthorized');
    }

    /**
     * Users field validator.
     *
     * @return array
     */
    protected function validateUser(): array
    {
        return \request()->validate([
            'username' => ['min:3'],
            'email' => ['email'],
            'password' => ['required'],
            'access_level_id' => ['required']
        ]);
    }
}
