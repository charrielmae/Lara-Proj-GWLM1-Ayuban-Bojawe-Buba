<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Group Project</title>

    <!-- Slot for page-specific CSS styles -->
    @stack('styles')
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
        </ul>
    </nav>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Footer with Group Members' Names -->
    <footer>
        <p>Developed by: Ayuban, Bojawe, Buba</p>
    </footer>

    <!-- Slot for page-specific JS scripts -->
    @stack('scripts')

</body>
</html>
