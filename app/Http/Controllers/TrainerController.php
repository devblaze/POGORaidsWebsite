<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(): Renderable {
        return view('raid.create');
    }

    public function store(){
        Raid::create($this->validateTrainer());
        return redirect(route('raid_index'));
    }

    protected function validateTrainer(): array
    {
        return request()->validate([
            'username' => ['required', 'min:3'],
            'trainer_id' => ['required', 'min:12', 'max:12'],
        ]);
    }

}
