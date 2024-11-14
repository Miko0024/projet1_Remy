
@extends('layouts.layout')

@section('content')
    <h1 class="nnn">Nos nouveautés</h1>
    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/books/image' . ($book['id'] ?? '') . '.jpg') }}"
                         onerror="this.src='{{ asset('images/books/default.jpg') }}'"
                         alt="{{ $book['title'] }}"
                         class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book['title'] }}</h5>
                        <p class="card-text">{{ $book['summary'] }}</p>
                        <p class="card-text">
                            <small class="text-muted">
                                Ajouté le {{ \Carbon\Carbon::parse($book['created_at'])->format('d/m/Y') }}
                            </small>
                        </p>
                        <p class="card-text">Auteur : {{ $book['author'] }}</p>
                        <p class="card-text">Année de publication : {{ $book['publication_date'] }}</p>
                        <p class="card-text">Prix : {{ $book['price'] }} $Ca</p>
                        <a href="{{ route('book.show', $book['id']) }}" class="btn btn-primary">Détails</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>Aucune nouveauté pour le moment.</p>
            </div>
        @endforelse
    </div>
@endsection
