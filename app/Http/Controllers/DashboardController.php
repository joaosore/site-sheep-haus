<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Property;
use App\User;
use App\Contract;
use App\IHabit;
use App\Match;
use App\Message;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = Auth::user();
        $auth_login = $user->id;

        $mensages = Message::where('from', '=', $auth_login)->orWhere('to', '=', $auth_login)->orderByRaw('updated_at DESC')->get();

        if($user->function === 'M') {

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
            
            return view('dashboard.dweller.dashboard', [
                'properties' => $properties,
                'match' => $matches,
                'auth_login' => $auth_login,
                'mensages' => $mensages
            ]);
        }

        if($user->function === 'P') {

            $properties = Property::where('user_id', $user->id)->get();

            return view('dashboard.owner.dashboard', [
                'properties' => $properties,
                'auth_login' => $auth_login,
                'mensages' => $mensages
            ]);
        }
        
    }
}
