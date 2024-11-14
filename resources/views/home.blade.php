



@extends('layouts.layout')

@section('content')
    <div id="homeContainer">
        <!-- Menu latéral fixe -->
        <div class="menu-box">
            <!-- Formulaire d'ajout -->
            <div class="add-box">
                <form action="{{ route('book.store') }}" method="POST">
                    @csrf
                    <h2>Ajouter un livre</h2>
                    <!-- <div class="form-group"> -->
                        <label for="title" class="form-label">Titre du livre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    <!-- </div> -->

                    <!-- Auteur -->
                    <!-- <div class="form-group"> -->
                        <label for="author" class="form-label">Nom de l'auteur</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    <!-- </div> -->

                    <!-- Année de publication -->
                    <!-- <div class="form-group"> -->
                        <label for="publication_date" class="form-label">Année de publication</label>
                        <input type="number" 
                               class="form-control" 
                               id="publication_date" 
                               name="publication_date" 
                               min="1800" 
                               max="{{ date('Y') }}" 
                               value="{{ date('Y') }}" 
                               required>
                    <!-- </div> -->

                    <!-- Prix -->
                    <!-- <div class="form-group"> -->
                        <label for="price" class="form-label">Prix ($)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    <!-- </div> -->

                    <!-- Résumé -->
                    <!-- <div class="form-group"> -->
                        <label for="summary" class="form-label">Résumé</label>
                        <textarea class="form-control" id="summary" name="summary" rows="3" required></textarea>
                    <!-- </div> -->

                    <!-- Bouton d'ajout -->
                    <!-- <div class="form-group"> -->
                        <button type="submit" class="btn">Ajouter le livre</button>
                    <!-- </div> -->
                </form>
            </div>

            <!-- Formulaire de recherche -->
            <div class="search-box">
                <form action="{{ route('book.search') }}" method="GET">
                    <h2>Rechercher un livre</h2>
                    <input type="text" name="query" class="form-control" placeholder="Titre ou auteur...">
                    <div class="form-group">
                        <button class="btn" type="submit">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Conteneur des livres -->
        <div id="booksContainer">
            <h1>Liste des livres</h1>
            <div class="books-grid">
                @foreach ($books as $book)
                    <div class="book-box">
                        <h3>{{ $book['title'] }}</h3>
                        <p>{{ $book['price'] }} $Ca</p>
                        <img src="{{ asset('images/books/image' . ($book['id'] ?? '') . '.jpg') }}" 
                             onerror="this.src='{{ asset('images/books/default.jpg') }}'"
                             alt="{{ $book['title'] }}">
                        
                        @if (isset($book['id']))
                            <div class="book-actions">
                                <a href="{{ route('book.show', $book['id']) }}" class="btn">Détails</a>
                                <form action="{{ route('book.delete', $book['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">Supprimer</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection