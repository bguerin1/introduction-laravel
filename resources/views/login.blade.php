@extends('layouts.base')

@section('title', 'Bienvenue')

@section('content')

<h1>Formulaire de connexion</h1>
<form action="/traitementLogin" method="POST">
    @csrf
    <input type="text" id="login" name="email" placeholder="Email"/>
    <br>
    <br>
    <input type="password" id="password" name="password" placeholder="Password"/>
    <br>
    <br>
    <input type="submit" value="Connexion"/>
</form>

<br>

@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

@endsection
