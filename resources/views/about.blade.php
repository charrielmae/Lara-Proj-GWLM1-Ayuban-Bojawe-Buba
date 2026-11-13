@extends('layouts.app')

@section('title', 'About | Chappell Roan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')

{{-- ============ HEADER (Poster 2 style) ============ --}}
<header class="about-header">
    <div class="about-haze" aria-hidden="true"></div>
    <span class="sparkle s1" aria-hidden="true"></span>
    <span class="sparkle s2" aria-hidden="true"></span>

    <div class="vertical-name" aria-hidden="true">Chappell Roan</div>

    <div class="about-header-text">
        <p class="label">about the artist</p>
        <h1 class="tagline">a midwest girl, a pink pony, and a very big stage</h1>
    </div>

    <div class="listeners">
        <span class="listeners-number">43,000,000</span>
        <span class="label">monthly listeners</span>
        <small>example figure &mdash; check Spotify for the current number</small>
    </div>
</header>

{{-- ============ BACKGROUND (Read More / Read Less) ============ --}}
<section class="about-section about-background">
    <h2>Background</h2>
    <p>
        Chappell Roan was born Kayleigh Rose Amstutz on February 19, 1998, in Willard, Missouri,
        the oldest of four children. She started piano lessons as a kid, sang in school choir,
        and posted covers online as a teenager under her birth name.
    </p>

    <div id="more-text" class="more-text" hidden>
        <p>
            She signed with a major label as a teenager in 2015 and adopted the stage name
            Chappell Roan the following year, honoring her late grandfather, Dennis K. Chappell,
            and his favorite song, &ldquo;The Strawberry Roan.&rdquo; Her debut single came out in 2017,
            followed by the School Nights EP. After being dropped by her label in 2020, she moved
            back home to Missouri, kept writing, and released Pink Pony Club.
        </p>
        <p>
            Her debut album arrived on September 22, 2023, and a year later its songs and her
            over-the-top stage looks pushed her into the mainstream. In 2024 she won Best New Artist
            at the MTV Video Music Awards, reached number one on the Billboard Artist 100, and
            released Good Luck, Babe!. In 2025 she won the Grammy for Best New Artist and released
            the singles The Giver and The Subway.
        </p>
    </div>

    <button type="button" id="read-toggle" class="btn" aria-expanded="false" aria-controls="more-text">
        Read More
    </button>
</section>

{{-- ============ TIMELINE ============ --}}
<section class="about-section">
    <h2>Timeline</h2>
    <ol class="timeline">
        <li><span class="year">1998</span><p>Born in Willard, Missouri</p></li>
        <li><span class="year">2015</span><p>Signs with a major label as a teenager</p></li>
        <li><span class="year">2016</span><p>Adopts the stage name Chappell Roan</p></li>
        <li><span class="year">2017</span><p>Debut single and the School Nights EP</p></li>
        <li><span class="year">2020</span><p>Parts ways with her label and releases Pink Pony Club</p></li>
        <li><span class="year">2023</span><p>Debut album The Rise and Fall of a Midwest Princess (Sept 22)</p></li>
        <li><span class="year">2024</span><p>VMA Best New Artist, number one on the Billboard Artist 100, Good Luck, Babe!</p></li>
        <li><span class="year">2025</span><p>Grammy for Best New Artist; singles The Giver and The Subway</p></li>
        <li><span class="year">2026</span><p>Headline festival runs in Australia, New Zealand, and South America</p></li>
    </ol>
</section>

{{-- ============ MISSION & VISION ============ --}}
<section class="about-section">
    <h2>Mission &amp; Vision</h2>
    <div class="mv-grid">
        <article class="card">
            <h3>Mission</h3>
            <p>To make big, sparkly pop for everyone who ever felt a little too much for their small town, and to turn every show into a pageant of joy.</p>
        </article>
        <article class="card">
            <h3>Vision</h3>
            <p>A pop world with more color, more camp, and more room for people to dress up as whoever they want to be.</p>
        </article>
    </div>
</section>

{{-- ============ STAGE PERSONAS ============ --}}
<section class="about-section">
    <h2>Stage Personas</h2>
    <div class="persona-grid">
        <article class="card">
            <h3>The Princess</h3>
            <p>The pageant-queen look: sash, crown, sequins, and a sense of humor.</p>
        </article>
        <article class="card">
            <h3>The Songwriter</h3>
            <p>Co-writes confessional, funny, danceable songs about love and growing up.</p>
        </article>
        <article class="card">
            <h3>The Performer</h3>
            <p>Drag-inspired makeup, wild costumes, and huge singalong crowds.</p>
        </article>
    </div>
</section>

{{-- ============ COUNTERS ============ --}}
<section class="about-section counters" id="counters">
    <div class="counter">
        <span class="count" data-target="14">0</span>
        <span class="label">tracks on the debut album</span>
    </div>
    <div class="counter">
        <span class="count" data-target="2023">0</span>
        <span class="label">album release year</span>
    </div>
    <div class="counter">
        <span class="count" data-target="1">0</span>
        <span class="label">grammy for best new artist</span>
    </div>
    <div class="counter">
        <span class="count" data-target="10">0</span>
        <span class="label">years since the stage name</span>
    </div>
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/about.js') }}"></script>
@endpush
