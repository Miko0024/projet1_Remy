<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $message = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'created_at' => now()->toDateTimeString()
        ];

        $messages = json_decode(file_get_contents(storage_path('app/message.json')), true);
        $messages[] = $message;
        file_put_contents(storage_path('app/message.json'), json_encode($messages));

        return redirect()->route('home');
    }
}
