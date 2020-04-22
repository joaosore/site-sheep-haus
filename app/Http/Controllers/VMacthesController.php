<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\VMatch;
use App\Vacancy;
use App\User;
use App\Message;
use App\Contract;
use App\Property;
use App\Subject;

use App\Mail\VMatchMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class VMacthesController extends Controller
{
    public function store(Request $request) {

        $auth = Auth::user();
        $auth_login = $auth->id;
        
        $user = [
            'user_id' => $auth->id
        ];

        $dados = array_merge($user, $request->except('_token'));

        $vmatch = VMatch::where('vacancy_id', '=', $request->vacancy_id)->first();

        if(empty($vmatch)) {
            
            $vacancy = Vacancy::where('id', '=',  $request->vacancy_id)->first();
            $contract = Contract::where('property_id', '=', $vacancy->property_id)->first();
            $property = Property::where('id', '=', $contract->property_id)->first();

            // VMatch::create($dados);

            $message = Message::where('from', '=', $auth_login)
                            ->where('to', '=', $request->user_id)
                            ->where('property_id', '=', $request->property_id)
                            ->orWhere('from', '=', $request->user_id)
                            ->where('to', '=', $auth_login)
                            ->where('property_id', '=', $request->property_id)
                            ->first();
            
            return $message;

            if(empty($message)) {
                Message::create([
                    'property_id' => (int) $contract->property_id,
                    'from' => (int) $auth->id,
                    'to' => (int) $request->user_id,
                    'last_mensagem' => 'Macth na Vaga ' . $property->name
                ]);
            } else {

                $last_mensagem = [
                    'last_mensagem' => 'Macth na Vaga ' . $property->name
                ];

                Message::where('from', '=', $auth_login)
                    ->where('to', '=', $request->user_id)
                    ->where('property_id', '=', $contract->property_id)
                    ->orWhere('from', '=', $request->user_id)
                    ->where('to', '=', $auth_login)
                    ->where('property_id', '=', $contract->property_id)
                    ->update($last_mensagem);
            }

            Subject::create([
                'property_id' => (int) $contract->property_id,
                'from' => (int) $auth->id,
                'to' => (int) $request->user_id,
                'mensagem' => 'Macth na Vaga ' . $property->name
            ]);

        }

        $vacancy = Vacancy::where('id', '=', $request->vacancy_id)->first();
        $owner = User::where('id', '=', $vacancy->user_id)->first();

        $dados = (object) array(
            'vacancy' => (object) $vacancy,
            'owner' => (object) $owner
        );

        // return redirect()->route('chats');
    }
}
