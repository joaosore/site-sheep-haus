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
use App\Match;

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
    
  public function details($id) {

      $auth = Auth::user();
      $immobile = Property::where('id', $id)->first();

      $immobile->galeries;    
      $immobile->account;

      $habit = [];
      foreach($immobile->ihabit as $key => $value) {
        $habit[] = $value->habit->name;
      }

      $immobile->habit = $habit;

      $characteristics = [];

      foreach($immobile->characteristics_id as $key => $value) {
          $characteristic = Characteristic::where('id', '=', $value)->first();
          $characteristics[$key]['id'] = (int) $value;
          $characteristics[$key]['name'] = $characteristic->name;
      }

      $immobile->characteristics = $characteristics;

      $matches = Match::where('user_id', '=', $auth->id)->pluck('property_id')->toArray();

      unset($immobile->ihabit);

      // dd($immobile->toArray());

      return view('dashboard.immobile.details', [
          'immobile' => $immobile,
          'matches' => $matches
      ]);
  }
}
