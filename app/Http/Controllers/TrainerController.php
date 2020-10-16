<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\View\View;

class TrainerController extends Controller
{
    public function index(): View
    {
        $trainer = Trainer::find(auth()->user()->id);
        return view('trainer.index', ['trainer' => $trainer]);

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

    public function edit(String $name): View
    {
        $trainer = Trainer::find(Trainer::getId($name));
        if (auth()->user()->id === $trainer->user_id)
        {
            return view('trainer.edit', compact('trainer'));
        }
        return view('admin.unauthorized');
    }

    public function update()
    {
        $trainer = Trainer::find(Trainer::getId(\request('name')));
        $trainer->update(\request()->validate([
                'name' => ['required', 'min:1', 'max:15'],
                'code' => ['required', 'min:12', 'max:12'],
                'level' => ['required', 'between:1,40'],
                'team' => ['required'],
                'pokedex' => ['nullable', 'between:1,645'],
            ],
                [
                    'name.required' => 'You must enter your trainer Name.',
                    'code.required' => 'You must enter your trainer Code.',
                    'team.required' => 'You must select your trainer Team.'
                ]
            ) + [
            'user_id' => auth()->user()->id
            ]);
        return redirect(route('trainer'));
//        return redirect('/trainer/' . auth()->user()->trainer->name);
    }

    public function destroy()
    {
        //
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
