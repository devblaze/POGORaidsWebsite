<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('trainer.index');
    }

    public function show() {
        return 0;
    }

    public function create(): View
    {
        return view('trainer.create');
    }

    public function store()
    {
        Trainer::create($this->validateTrainer() + [
                'user_id' => auth()->user()->id
            ]);
        return redirect(route('home'));

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {
    }

    protected function validateTrainer(): array
    {
        return \request()->validate([
            'name' => ['unique:trainers,name', 'required', 'min:1', 'max:15'],
            'code' => ['unique:trainers,code', 'required', 'min:12', 'max:12'],
            'level' => ['required', 'between:1,40'],
            'team' => ['required', 'different:Select..'],
            'pokedex' => ['nullable', 'between:1,645'],
        ],
            [
                'name.required' => 'You must enter your trainer Name.',
                'code.required' => 'You must enter your trainer Code.',
                'team.required' => 'You must select your trainer Team.'
            ]
        );
    }
}
