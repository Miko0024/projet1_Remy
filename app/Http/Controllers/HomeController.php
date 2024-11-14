<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $jsonFile;

    public function __construct()
    {
        $this->jsonFile = storage_path('app/books.json');
    }

    public function index()
    {
        $books = $this->getBooksList();
        return view('home', compact('books'));
    }

    public function showBook($id)
    {
        $book = $this->getBookById($id);
        return view('book-details', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'publication_date' => 'required|numeric|min:1900|max:' . date('Y'),
            'title' => 'required',
            'author' => 'required',
            'summary' => 'required',
            'price' => 'required|numeric|min:0'
        ]);

        $books = $this->getBooksList();

        // Trouver le plus grand ID existant
        $maxId = 0;
        foreach ($books as $book) {
            if (isset($book['id']) && $book['id'] > $maxId) {
                $maxId = $book['id'];
            }
        }

        $newBook = [
            'id' => $maxId + 1,
            'title' => $request->title,
            'author' => $request->author,
            'publication_date' => $request->publication_date,
            'summary' => $request->summary,
            'price' => (float)$request->price,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $books[] = $newBook;

        file_put_contents($this->jsonFile, json_encode(array_values($books), JSON_PRETTY_PRINT));

        return redirect()->route('home')->with('success', 'Livre ajouté avec succès');
    }

    
    //Pour aller chercher l'image
    private function getBookImagePath($id)
    {
        $imagePath = public_path('images/books/image' . $id . '.jpg');
        return file_exists($imagePath) ? 'image' . $id . '.jpg' : 'default.jpg';
    }

    //Pour supprimer un livre
    public function destroy($id)
    {
        $books = $this->getBooksList();
        
        $books = array_filter($books, function($book) use ($id) {
            return $book['id'] != $id;
        });
        
        file_put_contents($this->jsonFile, json_encode(array_values($books), JSON_PRETTY_PRINT));
        
        return redirect()->route('home');
    }

    //Pour chercher un livre
    public function search(Request $request)
    {
        $books = $this->searchBooks($request->input('query'));
        return view('home', compact('books'));
    }

    
    private function getBooksList()
    {
        $books = json_decode(file_get_contents($this->jsonFile), true) ?? [];
        // Pour s'assurer que chaque livre a un ID
        return array_map(function($book, $index) {
            if (!isset($book['id'])) {
                $book['id'] = $index + 1;
            }
            return $book;
        }, $books, array_keys($books));
    }

    private function getBookById($id)
    {
        $books = $this->getBooksList();
        foreach ($books as $book) {
            if ($book['id'] == $id) {
                return $book;
            }
        }
        return null;
    }

    private function searchBooks($query)
    {
        if (empty($query)) {
            return $this->getBooksList(); // Retourne tous les livres si la recherche est vide
        }

        $books = $this->getBooksList();
        return array_filter($books, function($book) use ($query) {
            // Vérifier si les clés existent avant de faire la recherche
            return (isset($book['title']) && stripos($book['title'], $query) !== false) ||
                (isset($book['author']) && stripos($book['author'], $query) !== false);
        });
    }
}