<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $username
     * @return View
     */
    public function edit(string $username): View
    {
        $user = User::find(User::where('username', $username)->value('id'));
        if ($user !== null && Auth::user()->id === $user->id)
        {
            return view('user.edit', ['user' => $user]);
        }
        return view('unauthorized');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        if ($request->new_password)
        {
            if (Hash::check($request->password, Auth::user()->password))
            {
                $request->user()->fill(['password' => Hash::make($request->new_password)])->save();
                $request->session()->flash('success', 'Your password has been changed.');
            } else {
                $user->update($this->validateUser());
                $request->session()->flash('failure', 'Your password has not been changed.');
            }
        } else {
            $request->session()->flash('success', 'Your password has not been changed.');
        }
        return redirect(route('user_edit', Auth::user()->username));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Validates the user edit fields from the user.
     *
     * @return array
     */
    public function validateUser(): array
    {
        return \request()->validate([
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:6']
        ]);
    }
}
