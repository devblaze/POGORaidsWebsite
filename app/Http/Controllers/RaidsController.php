<?php

namespace App\Http\Controllers;

use App\Raid;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class RaidsController extends Controller
{
    public function index() {
        // Shows a list of all items
        return Raid::latest()->get();
    }

    public function searchByName() {
        $request = \Request::get('q');
        if ($request !== null){
            return Raid::searchByName($request)->get();
        } else {
            return Raid::latest()->get();
        }
    }

    public function store(): String {
        return "It works!";
    }
}
