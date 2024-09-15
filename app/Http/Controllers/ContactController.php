<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function main(){
        return view('contact');
    }

    public function addContact(Request $request){
    
        Contact::create($request->all());
        return redirect("/contact");
    }

    public function listContact(Request $request){
        // Retourne à l'utilisateur le template nommés « monLayout » avec dedans une variable nommé `$todos` qui contiendra l'ensemble des éléments dans la table
        // Votre template devra utiliser cette variable avec par exemple un @foreach($todos as $todo) … @endforeach
        return view("/contact", ["contact" => Contact::all()]);
    } 
}
