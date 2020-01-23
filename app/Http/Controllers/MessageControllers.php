<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Message;
use App\Subject;


class MessageControllers extends Controller
{

    public function index() {
        return view('dashboard.chat.index ');
    }

    public function subject($recipient, $property) {

        $auth = Auth::user();
        $auth_login = $auth->id;

        $subjects = Subject::where('from', '=', $auth_login)
                            ->where('to', '=', $recipient)
                            ->where('property_id', '=', $property)
                            ->orWhere('from', '=', $recipient)
                            ->where('to', '=', $auth_login)
                            ->where('property_id', '=', $property)
                            ->get();

        return response()->json([
            'auth_login' => $auth_login,
            'recipient' => $recipient,
            'property' => $property,
            'subjects' => $subjects,
        ]);
    }

    public function chat() {

        $auth = Auth::user();
        $auth_login = $auth->id;

        $mensages = Message::where('from', '=', $auth_login)->orWhere('to', '=', $auth_login)->orderBy('updated_at', 'desc')->get();

        $men = [];
        foreach($mensages as $key => $mensagem) {

            if($mensagem->to == $auth_login) {
                $user = $mensagem->getUserFrom;
                $recipient = $mensagem->from;
            } else {
                $user = $mensagem->getUserTo;
                $recipient = $mensagem->to;
            }

            $mensagem->user_name = $user->name . ' ' . $user->last_name;
            $mensagem->recipient = $recipient;
            
            $men[$key] = $mensagem;
        }
        
        return response()->json([
            'mensages' => $mensages
        ]);
    }

    public function store($recipient, $property, Request $request) {
        
        $auth = Auth::user();
        $auth_login = $auth->id;

        $dados = [ 
            'property_id' => $property,
            'from' => $auth_login,
            'to' => $recipient,
        ];

        $last_mensagem = [
            'last_mensagem' => $request->mensagem
        ];

        $mensagem = array_merge($request->except('_token', '_method'), $dados);

        Message::where('from', '=', $auth_login)
            ->where('to', '=', $recipient)
            ->where('property_id', '=', $property)
            ->orWhere('from', '=', $recipient)
            ->where('to', '=', $auth_login)
            ->where('property_id', '=', $property)
            ->update($last_mensagem);
            
        Subject::create($mensagem);
        return redirect()->back();

    }
}
