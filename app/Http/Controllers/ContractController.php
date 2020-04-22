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
            $contracts = Contract::where('locator_id', '=', $user_id)->get();
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

        $user = Auth::user();

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
            $property->characteristics_id = '';
            

            if(!empty($property->characteristics_id)) {
                foreach($property->characteristics_id as $key => $value) {
                    $characteristic = Characteristic::where('id', '=', $value)->first();
                    $characteristics[$key]['id'] = (int) $value;
                    $characteristics[$key]['name'] = $characteristic->name;
                }
                $property->characteristics_id = $characteristics;
            }
            
            $property->galleries = $galleries;
            $property->accounts = $accounts;

            $dados[] = (object) [
                'contract' => (object) $contract, 
                'property' => (object) $property,
                'locador' => (object) $locador,
                'user' => (object) $user
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
                    'locator_pdf' => $imageName
                ]);
            break;
            case 'M':
                Contract::where('property_id', '=', $contract->property_id)->update([
                    'tenant_pdf' => $imageName
                ]);
            break;
        }

        // return response()->json(['mensagem' => 'Contrato Atualizado']);
        return redirect()->back();  

    }

    public function store(Request $request) {

        $auth = Auth::user();

        $property = Property::where('id', '=', $request->property_id)->first();

        $contract = Contract::where('tenant_id', '=', $auth->id)->where('property_id', '=', $request->property_id)->first();

        $data = array(
            'tenant_id' => $auth->id,
            'property_id' => $request->property_id,
            'locator_id' => $property->user_id
        );

        if(empty($contract)) {
            Contract::create($data);   
        }

        return redirect()->back();   
    }

    public function update(Request $request) {

        $contract = Contract::where('locator_id', '=', $request->locator_id)->where('property_id', '=', $request->property_id)->first();

        return $contract;

        if(empty($contract)) {
            Contract::update($request->except('_token'));   
        }
        
        return redirect()->back();   
    }

    public function destroy(Request $request) {
        
        Contract::where('locator_id', '=', $request->locator_id)->where('property_id', '=', $request->property_id)->delete();

        return redirect()->back();   
    }
}
