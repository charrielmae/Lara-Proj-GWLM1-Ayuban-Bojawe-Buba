{{-- Contact page: "Send a Fan Letter" --}}
@extends('layouts.app')

{{-- Load this page's own CSS (goes into @stack('styles') in the layout) --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

{{-- Page content (goes into @yield('content') in the layout) --}}
@section('content')
<section class="contact">

    {{-- ===== Header ===== --}}
    <header class="contact-header">
        <p class="label">Contact</p>
        <h1 class="contact-title">Send a Fan Letter</h1>
        <p class="tagline contact-tagline">dear midwest princess</p>
    </header>

    <div class="contact-grid">

        {{-- ===== Contact form (cream-edged card) ===== --}}
        <div class="letter-card">
            <span class="sparkle-corner" aria-hidden="true"></span>

            {{-- Success banner (hidden until the form is valid) --}}
            <div id="successMessage" class="success-banner" role="status" aria-live="polite" hidden>
                <span class="success-sparkle" aria-hidden="true"></span>
                <p>Thank you! Your fan letter has been sent. The princess will read it between sparkles.</p>
            </div>

            {{-- novalidate = turn off the browser's own popups so OUR JS messages show --}}
            <form id="contactForm" action="#" method="POST" novalidate>
                @csrf

                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Pink Pony Fan" autocomplete="name">
                    <span class="error-text" id="nameError" aria-live="polite"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" autocomplete="email">
                    <span class="error-text" id="emailError" aria-live="polite"></span>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="A letter for the princess">
                    <span class="error-text" id="subjectError" aria-live="polite"></span>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" rows="6" placeholder="Write your fan letter here"></textarea>
                    <span class="error-text" id="messageError" aria-live="polite"></span>
                </div>

                <button type="submit" class="btn-send">Send Letter</button>
            </form>
        </div>

        {{-- ===== Contact details (sample / made up for the class project) ===== --}}
        <aside class="details-card">
            <span class="sparkle-corner" aria-hidden="true"></span>
            <h2>Contact Details</h2>

            <ul class="details-list">
                <li>
                    <span class="label">Email</span>
                    <a href="mailto:fanletters@midwestprincess-fansite.example">fanletters@midwestprincess-fansite.example</a>
                </li>
                <li>
                    <span class="label">Booking</span>
                    <a href="mailto:booking@midwestprincess-fansite.example">booking@midwestprincess-fansite.example</a>
                </li>
                <li>
                    <span class="label">Phone</span>
                    <span>+1 (555) 010-0142</span>
                </li>
                <li>
                    <span class="label">Address</span>
                    <span>1 Pageant Lane, Springfield, MO (fictional)</span>
                </li>
                <li>
                    <span class="label">Hours</span>
                    <span>Mon to Fri, 9:00 AM to 5:00 PM</span>
                </li>
            </ul>

            <h3>Follow the Fan Site</h3>
            <p class="social">@midwestprincess.fansite on Instagram, TikTok, and X</p>
            <p class="sample-note">Contact details are sample information made up for this class project.</p>
        </aside>

    </div>
</section>
@endsection

{{-- Load this page's own JS (goes into @stack('scripts') in the layout) --}}
@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush
