<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        // $username = Auth::user()->username;
        // if(SaveParticipantes()){
            return view('welcome');
        // }
        // return "Hubo un error favor de recargar la pagina o llamar a soporte tecnico";
    }
}
