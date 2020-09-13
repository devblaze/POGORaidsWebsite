<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return Renderable
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(): Renderable
    {
        return view('home');
    }
}
