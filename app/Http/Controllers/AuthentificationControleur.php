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
        $request->validate(
            [
                'email' => 'required|email|max:255',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire.',
                'string' => 'Le champ :attribute doit être une chaîne de caractères.',
                'max' => 'Le champ :attribute ne peut pas dépasser :max caractères.',
                'email' => 'Le champ :attribute doit être une adresse email valide.',
                'min' => 'Le champ :attribute doit contenir au moins :min caractères.',
            ],
            [
                'email' => 'email',
            ]
        );

        // Dans la méthode traitementLogin
        
        $mdp = $request->input('password');
        $email = $request->input('email');
        $utilisateur = Utilisateur::where('email', $email)->first();
        $estValide = password_verify($mdp, $utilisateur->password);

        if ($estValide) {
            $request->session()->put('user', $utilisateur);
            return redirect('/todo');
        } else {
            return redirect('/login')->with('error', 'Identifiants incorrects !');
        }
    }

    public function register()
    {
        return view("register");
    }

    public function traitementRegister(Request $request)
    {   
        $request->validate(
            [
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:8',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire.',
                'string' => 'Le champ :attribute doit être une chaîne de caractères.',
                'max' => 'Le champ :attribute ne peut pas dépasser :max caractères.',
                'email' => 'Le champ :attribute doit être une adresse email valide.',
                'min' => 'Le champ :attribute doit contenir au moins :min caractères.',
            ],
            [
                'email' => 'email',
                'password' => 'mot de passe',
            ]
        );

        try{
            $users = new Utilisateur();
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
            $users->save();

            return redirect("/login");
        }
        catch (\Exception $e) {
            return redirect("/register" . $request->idh)->withErrors(['errors' => "Votre inscription a échoué."]);
        }
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        return redirect("/login");
    }
}
