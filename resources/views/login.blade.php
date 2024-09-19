@extends('layouts.base')

@section('title', 'Bienvenue')

@section('content')

<h1>Formulaire de connexion</h1>
<form action="/traitementLogin" method="POST">
    @csrf
    <input type="mail" id="login" name="email" placeholder="Email"/>
    <br>
    <br>
    <input type="password" id="password" name="password" placeholder="Password"/>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Connexion</button>
</form>

<br>

<p>Vous n'avez pas de compte ? <a href="/register">Inscription</a></p>

<br><br>

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
