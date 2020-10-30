<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\View\View;

class HomeController extends Controller
{
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function root(): View
    {
        return view('welcome');
    }

    public function index(): View
    {
        $pokemons = Pokemon::all();
        return view('home')->with('pokemons', $pokemons);
    }

    public function unauthorized(): View
    {
        return view('unauthorized');
    }
}
