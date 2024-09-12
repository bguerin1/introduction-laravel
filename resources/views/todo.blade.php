@extends('layouts.base')

@section('title', 'Bienvenue')

@section('content') 
   
<table>
    @foreach($todos as $todo)
    <tr>
        <td>{{$todo->texte}}</td><td><a href="termine/{{$todo->id}}">{{$todo->termine}}</a></td><td><a href="supp/{{$todo->id}}">Supprimer</a></td>
    </tr>
    @endforeach
</table>

<form method="POST" action="/todo">
    @csrf 
    <!-- La suite de votre formulaire -->
   <input type="text" name="texte">
   <button type="submit">Ajouter</button>
</form>

@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
@endsection
           