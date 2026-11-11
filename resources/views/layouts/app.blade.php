<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Group Project</title>
    @stack('styles')
</head>
<body>

    <nav>
        <ul>
            <li><a href="/">Home</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Developed by: Ayuban, Bojawe, Buba</p>
    </footer>

    @stack('scripts')

</body>
</html>
