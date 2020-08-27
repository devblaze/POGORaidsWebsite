<?php

namespace App\Http\Controllers;

use App\Raid;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function index(): Renderable {
        // Shows a list of all items
    }

    public function show(Raid $raid): Renderable {
        // Shows one item of that list
    }

    public function create(): Renderable {
        // Shows a view to create a new item
    }

    public function store(){
        // Persist the new item
    }

    public function edit(Raid $raid): Renderable{
        // Edit one item from the list
    }

    public function update(Raid $raid){
        // Persist the edited item
    }

    public function destroy(Raid $raid): Renderable{
        // Delete the item
    }
}
