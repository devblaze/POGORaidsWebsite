<?php

namespace App\Http\Controllers\Admin;

use App\Models\BugReport;
use App\Models\User;
use App\Models\AccessLevel;
use App\Models\Trainer;
use App\Models\Raid;
use App\Models\Pokemon;
use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('access');
    }

    /**
     * Display the view for the Admin panel with the counted data.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function index(): view
    {
        $data = [
            'users' => User::count(),
            'raids' => Raid::count(),
            'trainers' => Trainer::count(),
            'pokemon' => Pokemon::count()
        ];
        return view('admin.index')->with('data', $data);
    }

    /**
     * Return user's view with data for Admin Panel.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function users()
    {
        $levels = AccessLevel::get('id', 'name');
        $users = User::paginate(20);
        return view('admin.users')->with('users', $users, 'access_levels', $levels);
    }
    public function userEdit(User $user): view
    {
        return view('admin.userEdit', compact('user'));
    }
    public function userUpdate(User $user, Request $request)
    {
        return $request->username;
/*        $user->update([
            'username' => \request()->get('username'),
            'password' => Hash::make($request->password),
            'email' => \request()->get('email'),
            'access_level_id' => \request()->get('accessLevel')
        ]);
        return redirect(route('admin_test'));*/
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
