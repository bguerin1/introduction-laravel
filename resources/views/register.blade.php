@extends('layouts.base')

@section('title', 'Bienvenue')

@section('content')

<h1>Formulaire d'inscription</h1>

<form action="/traitementRegister" method="POST">
    @csrf
    <input type="text" id="name" name="name" placeholder="Nom"/>
    <br>
    <br>
    <input type="mail" id="login" name="email" placeholder="Email"/>
    <br>
    <br>
    <input type="password" id="password" name="password" placeholder="Password"/>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Inscription</button>
</form>

<br>

<p>Vous avez déjà un compte ? <a href="/login">Se connecter</a></p>

<br>

<br>



@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled text-start m-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
