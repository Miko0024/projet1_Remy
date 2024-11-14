@extends('layouts.layout')

@section('content')
<link rel="stylesheet" href="css/main.css">
<div class="mess">
    <h1 class="h1mess">Messages des clients</h1>
    <div class="messages-container">
        @foreach ($messages as $message)
        <div class="message-box">
            <div class="message-line">
                <h2>Nom: </h2><span>{{ $message['name'] }}</span>
            </div>
            <div class="message-line">
                <h2>Courriel: </h2><span>{{ $message['email'] }}</span>
            </div>
            <div class="message-line">
                <h2>Date: </h2><span>{{$message['created_at']}}</span>
            </div>
            <div>
                <h2>Message: </h2><textarea>{{ $message['message'] }}</textarea>
            </div>
        </div>
        @endforeach
    </div>
</div>

    
@endsection

