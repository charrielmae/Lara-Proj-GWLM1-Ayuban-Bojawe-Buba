<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Chappell Roan — The Rise and Fall of a Midwest Princess')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=Great+Vibes&family=Jost:wght@300;400;500;600;700&family=Pinyon+Script&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #1A0B14;
            --card: #2A1220;
            --text: #FBEFE6;
            --pink: #F7B6D2;
            --neon: #FF8FC7;
            --amber: #E8922E;
            --teal: #1B8FA3;
            --lilac: #B7A6E6;
            --red: #B9401E;
            --error: #FF6B6B;
            --nav-bg: rgba(26, 11, 20, 0.85);
            --border-color: rgba(247, 182, 210, 0.2);
            --card-border: rgba(247, 182, 210, 0.15);
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            --glow-color: rgba(255, 143, 199, 0.6);
            --btn-text: #1A0B14;
            
            --font-display: 'Pinyon Script', 'Great Vibes', cursive;
            --font-heading: 'Cormorant Garamond', Georgia, serif;
            --font-body: 'Jost', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        [data-theme="light"] {
            --bg: #FAF3EE;
            --card: #FFFFFF;
            --text: #2A1220;
            --pink: #B8457F; /* readable darker pink for light mode */
            --neon: #D8317A;
            --amber: #C97212;
            --teal: #147283;
            --lilac: #6A5CA0;
            --red: #A33315;
            --error: #D63031;
            --nav-bg: rgba(250, 243, 238, 0.9);
            --border-color: rgba(184, 69, 127, 0.25);
            --card-border: rgba(184, 69, 127, 0.2);
            --card-shadow: 0 10px 30px rgba(42, 18, 32, 0.08);
            --glow-color: rgba(184, 69, 127, 0.35);
            --btn-text: #FAF3EE;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: var(--font-body);
            font-weight: 300;
            line-height: 1.6;
            transition: background-color 0.4s ease, color 0.4s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Navigation Header */
        .site-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            background-color: var(--nav-bg);
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.4s ease, border-color 0.4s ease;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0.9rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            font-family: var(--font-display);
            font-size: 2.2rem;
            color: var(--pink);
            text-decoration: none;
            letter-spacing: 0.5px;
            text-shadow: 0 0 12px var(--glow-color);
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .nav-brand:hover {
            transform: scale(1.04);
            color: var(--neon);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 1.8rem;
        }

        .nav-link {
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--text);
            text-decoration: none;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            position: relative;
            padding: 0.3rem 0;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0%;
            height: 2px;
            background: linear-gradient(90deg, var(--neon), var(--amber));
            transition: width 0.3s ease;
        }

        .nav-link:hover {
            color: var(--pink);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .theme-toggle-btn {
            font-family: var(--font-body);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 0.5rem 1rem;
            background: rgba(247, 182, 210, 0.1);
            color: var(--pink);
            border: 1px solid var(--border-color);
            border-radius: 9999px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .theme-toggle-btn:hover {
            background: var(--pink);
            color: var(--btn-text);
            box-shadow: 0 0 15px var(--glow-color);
            transform: translateY(-1px);
        }

        /* Main Content */
        main {
            flex: 1;
            position: relative;
        }

        /* Site Footer */
        .site-footer {
            border-top: 1px solid var(--border-color);
            background-color: var(--card);
            padding: 3rem 1.5rem 2rem;
            margin-top: 4rem;
            text-align: center;
            position: relative;
            z-index: 10;
            transition: background-color 0.4s ease, border-color 0.4s ease;
        }

        .footer-content {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }

        .footer-logo {
            font-family: var(--font-display);
            font-size: 2.5rem;
            color: var(--pink);
            text-shadow: 0 0 10px var(--glow-color);
        }

        .footer-text {
            font-family: var(--font-body);
            font-size: 0.95rem;
            color: var(--text);
            opacity: 0.85;
        }

        .footer-credits {
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--lilac);
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 0.8rem;
            }
            .nav-menu {
                gap: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    <header class="site-header">
        <nav class="nav-container">
            <a href="/" class="nav-brand">Chappell Roan</a>
            <ul class="nav-menu">
                <li><a href="/" class="nav-link">Home</a></li>
                <li>
                    <button id="globalThemeToggle" class="theme-toggle-btn" aria-label="Toggle Theme">
                        <span id="themeIcon">✦</span>
                        <span id="themeLabel">Light Mode</span>
                    </button>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-logo">Chappell Roan</div>
            <p class="footer-text">The Rise and Fall of a Midwest Princess — Fan Site & Class Project</p>
            <p class="footer-credits">Developed by: Ayuban, Bojawe, Buba</p>
        </div>
    </footer>

    <script>
        (function() {
            const savedTheme = localStorage.getItem('chappell_theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);

            function updateThemeButtons(theme) {
                const isLight = theme === 'light';
                const label = isLight ? 'Dark Mode' : 'Light Mode';
                const icon = '✦';
                
                const btn = document.getElementById('globalThemeToggle');
                const labelSpan = document.getElementById('themeLabel');
                const iconSpan = document.getElementById('themeIcon');
                if (labelSpan) labelSpan.textContent = label;
                if (iconSpan) iconSpan.textContent = icon;

                // Sync any in-page toggles
                const pageBtn = document.getElementById('pageThemeToggle');
                if (pageBtn) {
                    pageBtn.innerHTML = `<span>${icon}</span> Switch to ${label}`;
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
                updateThemeButtons(currentTheme);

                function toggleTheme() {
                    const activeTheme = document.documentElement.getAttribute('data-theme');
                    const newTheme = activeTheme === 'light' ? 'dark' : 'light';
                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('chappell_theme', newTheme);
                    updateThemeButtons(newTheme);
                }

                const globalBtn = document.getElementById('globalThemeToggle');
                if (globalBtn) {
                    globalBtn.addEventListener('click', toggleTheme);
                }

                const pageBtn = document.getElementById('pageThemeToggle');
                if (pageBtn) {
                    pageBtn.addEventListener('click', toggleTheme);
                }
            });
        })();
    </script>

    @stack('scripts')

</body>
</html>
