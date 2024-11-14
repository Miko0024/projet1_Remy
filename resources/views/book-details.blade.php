@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" href="css/main.css">
    <h1>Détails du livre</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Titre: {{ $book['title'] }}</h5>
            <p class="card-text">Resume :{{ $book['summary'] }}</p>
            <p class="card-text">Auteur : {{ $book['author'] }}</p>
            <p class="card-text">Année de publication : {{ $book['publication_date'] }}</p>
            <p class="card-text">Prix : {{ $book['price'] }} $Ca</p>
            <a href="{{ route('home') }}">Retour à la liste</a>
        </div>
    </div>-
@endsection