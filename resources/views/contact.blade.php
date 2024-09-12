@extends('layouts.base')

@section('title', 'Bienvenue')

@section('content')
<h1>Formulaire de contact</h1>
<form action="/contact" method="POST">
    @csrf
    <label for="email">Email :</label>
    <input type="email" name="email">
    <br>
    <br>
    <label for="Titre">Titre :</label>
    <input type="text" name="titre">
    <br>
    <br>
    <label for="raison">Raison du contact : </label>
    <textarea name="raison"></textarea>
    <br>
    <br>
    <button type="submit">Envoyer</button>
</form>

@endsection
