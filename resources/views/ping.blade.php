@extends('layouts.base')

@section('title', 'Bienvenue')

@section('content')
   <h1>{{$word}}</h1>
   
   <ul>
    @foreach($serverInfo as $key => $value)
        <li>{{$key}} : {{$value}}</li>
   </ul>
   @endforeach

    @if($word === 'PING')
        <p>La page est en mode PING ({{ time() }})</p>
    @else
        <p>La page est en mode PONG ({{ time() }})</p>
    @endif

@endsection