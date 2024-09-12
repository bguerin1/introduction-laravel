<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoControleur extends Controller
{
    public function listTodo(Request $request){
        // Retourne à l'utilisateur le template nommés « monLayout » avec dedans une variable nommé `$todos` qui contiendra l'ensemble des éléments dans la table
        // Votre template devra utiliser cette variable avec par exemple un @foreach($todos as $todo) … @endforeach
        return view("/todo", ["todos" => Todo::all()]);
    }  

    public function addTodo(Request $request){
        // $request contient l'ensemble des données envoyées par le formulaire
        // request()->all() retourne un tableau associatif avec l'ensemble des données
        Todo::create($request->all());
        return redirect("/todo");
    }

    public function changeTodo($id){
        // Rechercher celui avec l’id « L'ID QUE VOUS SOUHAITEZ MODIFIER » (Exemple : 1)
        $todo = Todo::find($id);

        // Le passer à terminer
        $todo->termine = !$todo->termine;

        // Le sauvegarder en base de données. (Ici Eloquent va générer une requête de type UPDATE)
        $todo->save();

        return redirect("/todo");

    }

    public function suppTodo($id){
        $todo = Todo::find($id);
        if($todo->termine == true){
            $todo->delete(); // Le supprimer
        }
        return redirect("/todo");
    }
}
