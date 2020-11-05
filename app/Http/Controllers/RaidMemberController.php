<?php

namespace App\Http\Controllers;

use App\Models\Raid;
use App\Models\RaidMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RaidMemberController extends Controller
{

    public function store(Raid $raid)
    {
        $user = Auth::user();
        if (RaidMember::where('raid_id', $raid->id)->count() <= $raid->invites)
        {
            RaidMember::create([
                'raid_id' => $raid->id,
                'trainer_id' => $user->trainer->id
            ]);
        }
//        return $user->trainer->id;
        return redirect(route('raid_show')->with($raid->id));
    }
}
