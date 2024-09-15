@extends('layouts.base')

@section('title', 'Bienvenue')

@section('content')

@foreach($contact as $liste)
<p>{{$liste->titre}} <br> {{$liste->texte}} <br> {{$liste->date}}</p>
@endforeach

<h1>Formulaire de contact</h1>
<form action="/contact" method="POST">
    @csrf
    <label for="email">Email :</label>
    <input type="email" name="email">
    <br>
    <br>
    <label for="date">Date :</label>
    <input type="date" name="date" value="{{ now()->format('Y-m-d') }}" readonly>
    <br>
    <br>
    <label for="Titre">Titre :</label>
    <input type="text" name="titre">
    <br>
    <br>
    <label for="texte">Raison du contact : </label>
    <textarea name="texte"></textarea>
    <br>
    <br>
    <button type="submit">Envoyer</button>
</form>

<br>

@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

@endsection
