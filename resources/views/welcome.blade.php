@extends('layouts.app')

@push('styles')
<style>
    :root {
        --bg-color: #ffffff;
        --text-color: #1a202c;
        --card-bg: #f7fafc;
    }

    [data-theme="dark"] {
        --bg-color: #1a202c;
        --text-color: #f7fafc;
        --card-bg: #2d3748;
    }

    body {
        background-color: var(--bg-color);
        color: var(--text-color);
        transition: background-color 0.3s, color 0.3s;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    .hero-section {
        padding: 4rem 2rem;
        text-align: center;
        background-color: var(--card-bg);
        border-radius: 12px;
        margin: 3rem auto;
        max-width: 800px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .theme-toggle-btn {
        padding: 10px 20px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        background-color: #3182ce;
        color: white;
        font-weight: bold;
        margin-top: 1.5rem;
    }
</style>
@endstack

@section('content')
<section class="hero-section">
    <h1>Welcome to Our Group Project</h1>
    <p>This web application showcases our collaborative project theme, combining clean Laravel structural layouts with custom interactive components.</p>

    <button id="themeToggle" class="theme-toggle-btn">Switch to Dark Mode</button>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('themeToggle');

        toggleBtn.addEventListener('click', () => {
            const currentTheme = document.body.getAttribute('data-theme');
            if (currentTheme === 'dark') {
                document.body.removeAttribute('data-theme');
                toggleBtn.textContent = 'Switch to Dark Mode';
            } else {
                document.body.setAttribute('data-theme', 'dark');
                toggleBtn.textContent = 'Switch to Light Mode';
            }
        });
    });
</script>
@endpush
