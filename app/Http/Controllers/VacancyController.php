<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vacancy;
use App\Contract;
use App\Habit;
use App\VHabit;
use App\IHabit;
use App\VContract;

use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    public function index() {
        $user = Auth::user();
        $property = Contract::where('user_id', '=', $user->id)->first('property_id');

        $vcontract = VContract::where('property_id', '=', $property->property_id)->pluck('vacancy_id')->toArray();

        $vagas = Vacancy::where('user_id', '=', $user->id)->get();

        return view('dashboard.dweller.property.vacancies.index', [
            'property' => $property,
            'vagas' => $vagas,
            'vcontract' => $vcontract
        ]);
    }

    public function create($id) {
        $user = Auth::user();

        return view('dashboard.dweller.property.vacancies.create', [
            'user' => $user,
            'property' => $id,
        ]);
    }

    public function edit($id) {
        
        $vaga = Vacancy::where('id', '=', $id)->first();

        $ihabits = IHabit::where('property_id', '=', $vaga->property_id)->pluck('habit_id')->toArray();
        $habits = Habit::whereNotIn('id', $ihabits)->get();
        $vhabits = VHabit::where('property_id', '=', $vaga->property_id)->pluck('habit_id')->toArray();
        
        return view('dashboard.dweller.property.vacancies.edit', [
            'vaga' => $vaga,
            'habits' => $habits,
            'vhabits' => $vhabits
        ]);
    }

    public function update(Request $request) {
        $vaga = Vacancy::where('id', '=', $request->id)->update($request->except(['_token', '_method']));
        return redirect()->route('vacancies');
    }

    public function store(Request $request) {
        $vaga = Vacancy::create($request->except('_token'));
        return redirect()->route('vacancies.edit', [$vaga->id]);
    }

    public function destroy(Request $request) {
        Vacancy::where('id', '=', $request->id)->delete();
        return redirect()->back();
    }
}
