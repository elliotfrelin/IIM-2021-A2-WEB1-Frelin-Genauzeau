<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function welcome()
    {
        //  $name1 = 'Valentin Genauzeau';
        //  $name2 = 'Elliot Frelin';


        //    return view('welcome', [
        //        'prenom' => $prenom,
        //        'nom'    => $nom,
        //    ]);

        return view('welcome');
    }
}
