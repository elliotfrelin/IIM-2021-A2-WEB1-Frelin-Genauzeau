<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $prenom = 'Valentin';
        $nom = 'Genauzeau';


        //    return view('welcome', [
        //        'prenom' => $prenom,
        //        'nom'    => $nom,
        //    ]);

        return view('welcome', compact('prenom', 'nom'));
    }
}
