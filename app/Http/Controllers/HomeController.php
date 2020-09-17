<?php

namespace App\Http\Controllers;

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
        return view('home');
    }
}
