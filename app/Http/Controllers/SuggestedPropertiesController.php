<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Property;
use App\IHabit;
use App\User;
use App\Match;
use App\Contract;

class SuggestedPropertiesController extends Controller
{
    public function index(){

        $auth = Auth::user();
        $user = User::where('id', '=', $auth->id)->first();
        $contract = Contract::pluck('property_id')->toArray();

        $mhabit = [];
        $ihabit = [];
        $match = [];

        $mhabit = $user->mhabit->pluck('habit_id')->toArray();
        $IHabits = IHabit::whereIn('habit_id', $mhabit)->get();

        $ihabit = $IHabits->pluck('property_id')->toArray();
        $ihabit = array_unique($ihabit);

        $imoveis = array_diff($ihabit, $contract);
       
        $properties = Property::whereIn('id', $imoveis)->get();

        $matches = Match::where('user_id', '=', $auth->id)->pluck('property_id')->toArray();
       
        $likes = Property::whereIn('id', $matches)->get();

        return view('dashboard.dweller.propertes.index', [
            'properties' => $properties,
            'match' => $matches,
            'likes' => $likes,
            'matches' => []
        ]);
    }

    public function map()
    {
        return view('dashboard.dweller.propertes.map');
    }

    public function settings()
    {
        return view('dashboard.dweller.propertes.settings');
    }
}
