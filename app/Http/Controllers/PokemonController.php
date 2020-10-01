<?php

namespace App\Http\Controllers;

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
        //
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


}
