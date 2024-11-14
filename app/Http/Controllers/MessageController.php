<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller

{
    public function index()
    {
        $messages = $this->getMessages();
        return view('messages', compact('messages'));
    }

    private function getMessages()
    {
        return json_decode(file_get_contents(storage_path('app/message.json')), true);
    }
}