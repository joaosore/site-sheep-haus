<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Match;
use App\Property;
use App\User;
use App\Message;
use App\Subject;

use App\Mail\MatchMail;
use Illuminate\Support\Facades\Mail;

class MacthController extends Controller
{
    public function index() {

    }

    public function store(Request $request) {

        $auth = Auth::user();
        $auth_login = $auth->id;
        
        $user = [
            'user_id' => $auth->id
        ];

        $dados = array_merge($user, $request->except('_token', 'user_id'));

        $get = Match::where('user_id', '=', $auth->id)->where('property_id', '=', $request->property_id)->first();
        $owner_id = Property::where('id', '=',  $request->property_id)->pluck('user_id')->first();
        $property = Property::where('id', '=', $request->property_id)->first();
        
        if(empty($get)) {

            Match::create($dados);

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
                    'last_mensagem' => 'Macth Imóvel ' . $property->name
                ]);
            } else {

                $last_mensagem = [
                    'last_mensagem' => 'Macth Imóvel ' . $property->name
                ];

                Message::where('from', '=', $owner_id)
                    ->where('to', '=', $request->user_id)
                    ->where('property_id', '=', $request->property_id)
                    ->orWhere('from', '=', $request->user_id)
                    ->where('to', '=', $owner_id)
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

        
        $owner = User::where('id', '=', $property->user_id)->first();

        $dados = array(
            'usuario' => $auth,
            'property' => $property,
            'owner' => $owner
        );

        if($auth->function === 'M') {
            // Mail::to($owner->email)
            // ->bcc('jaumcj@gmail.com')
            // ->send(new MatchMail($dados));
            return redirect()->route('email.create', [$request->user_id, $request->property_id]);
            // return redirect()->back();
        }
    }
}
