<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Contract;
use App\Match;
use App\Property;
use App\Characteristic;
use App\Gallery;
use App\Account;

class ContractController extends Controller
{

    public function index() {

        $user = Auth::user();
        $user_id = $user->id;

        $property = Property::where('user_id', $user_id)->pluck('id')->toArray();

        if(empty($property)){
            $contracts = Contract::where('user_id', '=', $user_id)->get();
        } else {
            $contracts = Contract::whereIn('id', $property)->get();
        }

        $dados = [];
        foreach($contracts as $contract) {

            $habits = [];
            $galleries = [];
            $accounts = [];

            $property = Property::where('id', $contract->property_id)->first();
            $locador = User::where('id', $property->user_id)->first();
            $galleries = Gallery::where('property_id', $property->id)->get();
            $accounts = Account::where('property_id', $property->id)->get();

            $property->ihabit;
            $characteristics = [];

            foreach($property->characteristics_id as $key => $value) {
                $characteristic = Characteristic::where('id', '=', $value)->first();
                $characteristics[$key]['id'] = (int) $value;
                $characteristics[$key]['name'] = $characteristic->name;
            }

            $property->characteristics_id = $characteristics;
            $property->galleries = $galleries;
            $property->accounts = $accounts;

            $dados[] = (object) [
                'contract' => (object) $contract, 
                'property' => (object) $property,
                'locador' => (object) $locador
            ];
            
        }

        return response()->json($dados);

    }

    public function show($id) {

        $contracts = Contract::where('id', $id)->get();

        $dados = [];
        foreach($contracts as $contract) {

            $habits = [];
            $galleries = [];
            $accounts = [];

            $property = Property::where('id', $contract->property_id)->first();
            $locador = User::where('id', $property->user_id)->first();
            $galleries = Gallery::where('property_id', $property->id)->get();
            $accounts = Account::where('property_id', $property->id)->get();

            $property->ihabit;
            $characteristics = [];

            foreach($property->characteristics_id as $key => $value) {
                $characteristic = Characteristic::where('id', '=', $value)->first();
                $characteristics[$key]['id'] = (int) $value;
                $characteristics[$key]['name'] = $characteristic->name;
            }

            $property->characteristics_id = $characteristics;
            $property->galleries = $galleries;
            $property->accounts = $accounts;

            $dados[] = (object) [
                'contract' => (object) $contract, 
                'property' => (object) $property,
                'locador' => (object) $locador
            ];
            
        }

        return view('dashboard.contracts.index', [
            'dados' => $dados 
        ]);
    }

    public function contract(Request $request, $id) {

        $user = Auth::user();
        $user_id = $user->id;

        $contract = Contract::where('id', $id)->first();
        $user = User::where('id', '=', $user->id)->pluck('function')->first();
        

        $imageName = time().'.'.$request->pdf->extension();  
        $request->pdf->move(public_path('pdf'), $imageName);

        switch($user) {
            case 'P':
                Contract::where('property_id', '=', $contract->property_id)->update([
                    'owner' => $imageName
                ]);
            break;
            case 'M':
                Contract::where('property_id', '=', $contract->property_id)->update([
                    'dweller' => $imageName
                ]);
            break;
        }

        return response()->json(['mensagem' => 'Contrato Atualizado']);

    }

    public function store(Request $request) {

        $contract = Contract::where('user_id', '=', $request->user_id)->where('property_id', '=', $request->property_id)->first();

        if(empty($contract)) {
            Contract::create($request->except('_token'));   
        }

        return redirect()->back();   
    }

    public function destroy(Request $request) {
        
        Contract::where('user_id', '=', $request->user_id)->where('property_id', '=', $request->property_id)->delete();

        return redirect()->back();   
    }
}
