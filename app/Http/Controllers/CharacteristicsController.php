<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Characteristic;

class CharacteristicsController extends Controller
{
    public function index() {
        $characteristic = Characteristic::get(['id', 'name']);
        return response()->json($characteristic);
    }

}
