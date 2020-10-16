<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function index(): Renderable
    {
        //
    }

    public function show(Party $party): Renderable
    {
        return view('', ['party', $party]);
    }

    public function create(): Renderable {
        // Shows a view to create a new item
    }

    public function store(){
        // Persist the new item
    }

    public function edit(Party $raid): Renderable{
        // Edit one item from the list
    }

    public function update(Party $raid){
        // Persist the edited item
    }

    public function destroy(Party $raid): Renderable{
        // Delete the item
    }
}
