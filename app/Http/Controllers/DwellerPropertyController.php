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

        $contract = Contract::where('tenant_id', '=', $auth->id)->first();

        if($contract) { 
            $contrato_assing = true;
            if($contract->locator_pdf === null || $contract->tenant_pdf === null) {
                $contrato_assing = false;
            }
        } else {
            $contrato_assing = true;
        }

        if(!empty($contract)){
            $contract->property;
        }
        

        return view('dashboard.dweller.property.index', [
            'contract' => $contract,
            'type' => $type,
            'contrato_assing' => $contrato_assing
        ]);
    }
}
