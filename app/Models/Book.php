<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Book
{
    protected static $file = 'books.json';

    // Récupère tous les livres depuis le fichier JSON
    public static function all()
    {
        return json_decode(Storage::get(self::$file), true);
    }

    // Ajoute un nouveau livre
    public static function create($data)
    {
        $books = self::all();
        $data['id'] = end($books)['id'] + 1; // Pour Génerer un nouvel ID
        $books[] = $data;
        Storage::put(self::$file, json_encode($books, JSON_PRETTY_PRINT));
        return $data;
    }

    // Pour trouver un livre par ID
    public static function find($id)
    {
        $books = self::all();
        foreach ($books as $book) {
            if ($book['id'] == $id) {
                return $book;
            }
        }
        return null;
    }

    // Pour mettre à jour un livre par ID
    public static function update($id, $data)
    {
        $books = self::all();
        foreach ($books as &$book) {
            if ($book['id'] == $id) {
                $book = array_merge($book, $data);
                Storage::put(self::$file, json_encode($books, JSON_PRETTY_PRINT));
                return $book;
            }
        }
        return null;
    }

    // Pour supprimer un livre par ID
    public static function delete($id)
    {
        $books = self::all();
        $books = array_filter($books, fn($book) => $book['id'] != $id);
        Storage::put(self::$file, json_encode($books, JSON_PRETTY_PRINT));
    }
}
