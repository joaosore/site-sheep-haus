<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Characteristic;
use App\Property;
use App\IHabit;
use App\Gallery;
use App\Account;
use App\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProperty;

class ImmobileController extends Controller
{
    
    public function show($id) {

        $immobile = Property::where('id', $id)->first();

        $immobile->galeries;    
        $immobile->account;

        $habit = [];
        foreach($immobile->ihabit as $key => $value) {
          $habit[] = $value->habit->name;
        }

        $immobile->habit = $habit;

        unset($immobile->ihabit);

        return response()->json($immobile);
        
    }
}
