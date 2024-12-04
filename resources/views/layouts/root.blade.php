<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TechNova Labs')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('style/style.css') }}" type="text/css" >

    <script src="{{ asset('js/script.js') }}" type="text/javascript" defer></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="TechNova Logo" class="navbar-logo">
        </div>
        <a class="navbar-brand" href="{{ route('home') }}">TechNova Labs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('programs.index') }}">Programs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('innovations') }}">Innovations</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact.index') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

@if(session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

@yield('content')

<!-- Footer -->
<footer class="footer bg-dark text-white py-3 text-center">
    <p>&copy; 2024 TechNova Labs. All Rights Reserved.</p>
</footer>

</body>
</html>
