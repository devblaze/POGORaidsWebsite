<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BugReportController extends Controller
{
    public function index(): View
    {
        return view('bug.report');
    }

    public function create(): View
    {
        return view('bug.report');
    }

    public function store()
    {
        BugReport::create($this->validateBugReport());
        return redirect(route('home'));
    }

    /**
     * Validate the Bug Report fields from the user.
     *
     * @return array
     */
    protected function validateBugReport(): array
    {
        return \request()->validate([
            'user_id' => ['required'],
            'type' => ['required', 'min:1', 'max:21'],
            'desc' => ['required', 'min:10'],
        ]/*,
            [
                'name.required' => 'You must select a Pokemon.'
            ]*/
        );
    }

}
