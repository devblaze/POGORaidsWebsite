<?php

namespace App\Http\Controllers;

use App\Raid;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class RaidsController extends Controller
{
    public function test(): String {
        return "It works!";
    }

    public function searchByName(){
        $request = \Request::get('q');
        if ($request !== null){
            return Raid::searchByName($request)->get();
        } else {
            return Raid::latest()->get();
        }
    }
}
