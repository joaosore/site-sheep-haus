<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\IHabit;
use App\MHabit;
use App\User;
use App\Alert;
use App\Property;
use App\Message;
use App\Subject;

use App\Mail\AlertMail;
use Illuminate\Support\Facades\Mail;

class AlertPropertyController extends Controller
{


    public function index($id) {

        $habit_id = IHabit::where('property_id', '=', $id)->pluck('habit_id')->toArray();
        $user_id = MHabit::whereIn('habit_id', $habit_id)->pluck('user_id')->toArray();
        $user_id = array_unique($user_id);

        $Users = User::whereIn('id', $user_id)->get();

        $Alerts = Alert::where('property_id', '=', $id)->pluck('user_id')->toArray();

        return view('dashboard.owner.alerts.index', [
            'users' => $Users,
            'property' => $id,
            'alerts' => $Alerts
        ]);
    }

    public function store(Request $request) {

        $auth = Auth::user();
        $auth_login = $auth->id;

        $get = Alert::where('user_id', '=', $request->user_id)->where('property_id', '=', $request->property_id)->first();
        $property = Property::where('id', '=', $request->property_id)->first();

        if(empty($get)) {
            Alert::create($request->all());
            
            $message = Message::where('from', '=', $auth_login)
                            ->where('to', '=', $request->user_id)
                            ->where('property_id', '=', $request->property_id)
                            ->orWhere('from', '=', $request->user_id)
                            ->where('to', '=', $auth_login)
                            ->where('property_id', '=', $request->property_id)
                            ->first();
            if(empty($message)) {
                Message::create([
                    'property_id' => (int) $request->property_id,
                    'from' => (int) $auth->id,
                    'to' => (int) $request->user_id,
                    'last_mensagem' => 'O Morador Sugeriu o Imóvel ' . $property->name . ' para você.'
                ]);
            } else {

                $last_mensagem = [
                    'last_mensagem' => 'O Morador Sugeriu o Imóvel ' . $property->name . ' para você.'
                ];

                Message::where('from', '=', $auth_login)
                    ->where('to', '=', $request->user_id)
                    ->where('property_id', '=', $request->property_id)
                    ->orWhere('from', '=', $request->user_id)
                    ->where('to', '=', $auth_login)
                    ->where('property_id', '=', $request->property_id)
                    ->update($last_mensagem);
            }

            Subject::create([
                'property_id' => (int) $request->property_id,
                'from' => (int) $auth->id,
                'to' => (int) $request->user_id,
                'mensagem' => 'O Morador Sugeriu o Imóvel ' . $property->name . ' para você.'
            ]);

            
        }

        $property = Property::where('id', '=', $request->property_id)->first();
        $dweller = User::where('id', '=', $request->user_id)->first();
        
        $dados = array(
            'usuario' => $dweller,
            'property' => $property,
        );

        //Mail::to($dweller->email)
        // ->bcc('jaumcj@gmail.com')
        // ->send(new AlertMail($dados));
        return redirect()->route('email.create', [$request->user_id, $request->property_id]);
        // return redirect()->back();
    }
}
