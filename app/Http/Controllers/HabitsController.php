<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habit;

class HabitsController extends Controller
{
    public function index() {
      $Habit = Habit::get(['id', 'name']);
      return response()->json($Habit);
    }

}
