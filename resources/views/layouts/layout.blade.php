<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mike Bookcase</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                    <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    <a class="nav-link" href="{{ route('new-books') }}">Nos nouveautés</a>
                    <a class="nav-link" href="{{ route('contact') }}">Contactez-nous</a>
                    <a class="nav-link" href="{{ route('messages') }}">Messages</a>
                    <img src="{{ asset('images/logo.png') }}" alt="logo">
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer>
        <div class="footcontainer">
            <div class="social">
                <p>&copy; Mike Bookcase 2024. Tous droits réservés.</p>
                <a href="https://www.x.com/" target="_blank">
                <img class="sociallogo" src="{{ asset('images/x.png') }}" alt="X">
                </a>
                <a href="https://www.facebook.ca/" target="_blank">
                <img class="sociallogo" src="{{ asset('images/face.png') }}" alt="Facebook">
                </a>
                <a href="https://www.instagram.ca/" target="_blank">
                <img class="sociallogo" src="{{ asset('images/insta.png') }}" alt="Instagram">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>