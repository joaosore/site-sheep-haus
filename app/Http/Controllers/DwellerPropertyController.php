<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contract;
use App\Property;
use App\VContract;

use Illuminate\Support\Facades\Auth;

class DwellerPropertyController extends Controller
{
    public function index() {

        $auth = Auth::user();

        $type = true;

        $contract = Contract::where('user_id', '=', $auth->id)->first();

        if(empty($contract)){
            $contract = VContract::where('user_id', '=', $auth->id)->first();
            $contract->vacancy;
            $type = false;
        }

        if(!empty($contract)){
            $contract->property;
        }
        
        return view('dashboard.dweller.property.index', [
            'contract' => $contract,
            'type' => $type
        ]);
    }
}
