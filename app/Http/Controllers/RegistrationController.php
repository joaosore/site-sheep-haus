<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('dashboard.registration')->with('user', $user);
    }
    public function store(){
        
    }
}
