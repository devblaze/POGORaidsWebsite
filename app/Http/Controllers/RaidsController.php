<?php

namespace App\Http\Controllers;

use App\Raid;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class RaidsController extends Controller
{
    public function index() {
        /**
         * Get a list of the all raids first the latest.
         */
        return Raid::latest()->get();
    }

    public function searchByName() {
        /**
         * Check if the request is empty if it's not use the searchByName otherwise get all raids latest the first.
         */
        $request = \Request::get('q');
        if ($request !== null){
            return Raid::searchByName($request)->get();
        } else {
            return Raid::latest()->get();
        }
    }

    public function getRaidSeconds(): int
    {
        /**
         * Request the model to search for the raid and return the seconds left.
         */
        $request = \Request::get('id');
        return Raid::getSecondsLeft($request);
    }
}
