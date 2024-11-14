<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Message
{
    protected static $file = 'messages.json';

    // Récupérer tous les messages
    public static function all()
    {
        return json_decode(Storage::get(self::$file), true);
    }

    // Pour créer un nouveau message
    public static function create($data)
    {
        $messages = self::all();
        $data['id'] = end($messages)['id'] + 1 ?? 1; // Pour générer un nouvel ID
        $messages[] = $data;
        Storage::put(self::$file, json_encode($messages, JSON_PRETTY_PRINT));
        return $data;
    }
}
