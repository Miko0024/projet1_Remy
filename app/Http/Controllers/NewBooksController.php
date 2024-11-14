<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class NewBooksController extends Controller
{
    private $jsonFile;

    public function __construct()
    {
        $this->jsonFile = storage_path('app/books.json');
    }

    public function index()
    {
        $books = $this->getNewBooks();
        return view('new-books', compact('books'));
    }

    private function getNewBooks()
    {
        $books = json_decode(file_get_contents($this->jsonFile), true) ?? [];
        $cutoffDateTime = Carbon::now()->subHours(48);

        return array_filter($books, function($book) use ($cutoffDateTime) {
            if (!isset($book['created_at'])) {
                return false;
            }

            try {
                $createdAt = Carbon::parse($book['created_at']);
                // Vérifie si la date de création est après la date limite (24h avant maintenant)
                return $createdAt->isAfter($cutoffDateTime);
            } catch (\Exception $e) {
                return false;
            }
        });
    }
}