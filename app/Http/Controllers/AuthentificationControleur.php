<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AuthentificationControleur extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function traitementLogin(Request $request)
    {

        $validated = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire.',
                'email' => 'Le champ :attribute doit être une adresse email valide.',
            ],
            [
                'email' => 'email',
                'password' => 'mot de passe',
            ]
        );

        // Dans la méthode traitementLogin
        
        $mdp = $request->input('password');
        $email = $request->input('email');
        $utilisateur = Utilisateur::where('email', $email)->first();
        $estValide = password_verify($mdp, $utilisateur->password);

        if ($estValide) {
            $request->session()->put('user', $utilisateur);
        } else {
            return redirect('/login')->with('error', 'Identifiants incorrects');
        }
    }

    public function register()
    {
        
    }

    public function traitementRegister(Request $request)
    {
        
        
        // Dans la méthode traitementRegister
        
        $mdp = $request->input('password');
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
    }
}
