<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\User;
use App\Contract;
use App\IHabit;
use App\MHabit;
use App\Alert;
use App\Property;

class PropertyMatchesController extends Controller
{
    public function show($id) {

        $dados = [];
        $tenant_interest = Contract::where('property_id', '=', $id)->first();
        $contract = Contract::where('property_id', '=', $id)->pluck('locator_id')->toArray();

        $macth = Match::where('property_id', '=', $id)->pluck('user_id')->toArray();
        
        $users_contracts = Contract::pluck('locator_id')->toArray();

        if(!empty($contract)) {
            $user_id = $contract;
        } else {
            $user_id = array_diff($macth, $users_contracts);
        }

        if(!empty($tenant_interest)) {
            $contract_id = $tenant_interest->id;
            $tenant_interest = $tenant_interest->tenant_interest;
        } else {
            $tenant_interest = '';
            $contract_id = '';
        }
        
        

        $Users_macth = User::whereIn('id', $user_id)->get();
        
        $habit_id = IHabit::where('property_id', '=', $id)->pluck('habit_id')->toArray();
        $user_id_m = MHabit::whereIn('habit_id', $habit_id)->pluck('user_id')->toArray();
        $user_id_m = array_unique($user_id_m);
        $user_id_m = array_diff($user_id_m, $user_id);

        $Users_alerts = User::whereIn('id', $user_id_m)->get();

        $Alerts = Alert::where('property_id', '=', $id)->pluck('user_id')->toArray();

        $Property = Property::find($id);
        
        return view('dashboard.owner.matches.index', [
            'matchs' => $Users_macth,
            'contract' => $contract,
            'property' => $Property,
            'alerts' => $Users_alerts,
            'create_alerts' => $Alerts,
            'tenant_interest' => $tenant_interest,
            'contract_id' => $contract_id
        ]);
    }
}
