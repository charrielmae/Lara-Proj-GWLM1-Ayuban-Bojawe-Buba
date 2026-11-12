@extends('layouts.app')

@section('title', 'Chappell Roan — The Rise and Fall of a Midwest Princess | Home')

@push('styles')
<style>
    /* ========================================================
       CHAPPELL ROAN HOMEPAGE STYLING (POSTER STYLES & THEMES)
       ======================================================== */

    .page-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    /* Ambient Twinkling Sparkles */
    .sparkle-canvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .sparkle {
        position: absolute;
        color: var(--pink);
        animation: twinkle 3s infinite ease-in-out;
        opacity: 0.7;
        user-select: none;
    }

    @keyframes twinkle {
        0%, 100% { opacity: 0.2; transform: scale(0.7) rotate(0deg); }
        50% { opacity: 1; transform: scale(1.3) rotate(20deg); text-shadow: 0 0 12px var(--neon); }
    }

    /* ==========================================
       HERO: POSTER 3 STYLE
       Warm amber and violet haze + glowing script
       ========================================== */
    .hero-poster-3 {
        position: relative;
        padding: 5rem 1.5rem 6rem;
        background: radial-gradient(circle at 50% 30%, rgba(232, 146, 46, 0.25) 0%, rgba(92, 29, 72, 0.45) 40%, var(--bg) 85%),
                    linear-gradient(180deg, rgba(26, 11, 20, 0.4) 0%, var(--bg) 100%);
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    [data-theme="light"] .hero-poster-3 {
        background: radial-gradient(circle at 50% 30%, rgba(232, 146, 46, 0.2) 0%, rgba(247, 182, 210, 0.35) 45%, var(--bg) 90%),
                    linear-gradient(180deg, rgba(250, 243, 238, 0.6) 0%, var(--bg) 100%);
    }

    .hero-frame {
        position: relative;
        z-index: 2;
        max-width: 920px;
        width: 100%;
        margin: 0 auto;
        padding: 4rem 2.5rem;
        background: rgba(42, 18, 32, 0.55);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 2px solid var(--pink);
        border-radius: 20px;
        box-shadow: 0 0 40px rgba(255, 143, 199, 0.25), inset 0 0 30px rgba(232, 146, 46, 0.15);
        outline: 1px dashed var(--amber);
        outline-offset: -12px;
    }

    [data-theme="light"] .hero-frame {
        background: rgba(255, 255, 255, 0.85);
        border: 2px solid var(--pink);
        box-shadow: 0 15px 40px rgba(184, 69, 127, 0.15), inset 0 0 30px rgba(232, 146, 46, 0.1);
        outline: 1px dashed var(--amber);
        outline-offset: -12px;
    }

    .hero-badge {
        display: inline-block;
        font-family: var(--font-body);
        font-weight: 600;
        font-size: 0.8rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--amber);
        background: rgba(232, 146, 46, 0.15);
        padding: 0.35rem 1.2rem;
        border-radius: 50px;
        border: 1px solid var(--amber);
        margin-bottom: 1.5rem;
    }

    /* Glowing script wordmark */
    .hero-wordmark {
        font-family: var(--font-display);
        font-size: clamp(3.8rem, 10vw, 7.5rem);
        line-height: 1.05;
        color: var(--pink);
        text-shadow: 0 0 12px var(--neon), 0 0 30px rgba(255, 143, 199, 0.6), 0 0 50px rgba(232, 146, 46, 0.4);
        margin-bottom: 0.5rem;
        font-weight: 400;
        transform: rotate(-1.5deg);
        display: inline-block;
        transition: transform 0.3s ease, text-shadow 0.3s ease;
    }

    .hero-wordmark:hover {
        transform: rotate(0deg) scale(1.02);
        text-shadow: 0 0 20px var(--neon), 0 0 45px var(--neon), 0 0 70px rgba(232, 146, 46, 0.6);
    }

    /* Lowercase serif tagline */
    .hero-tagline {
        font-family: var(--font-heading);
        font-style: italic;
        font-weight: 600;
        font-size: clamp(1.4rem, 4vw, 2.3rem);
        color: var(--text);
        text-transform: lowercase;
        letter-spacing: 0.04em;
        margin-top: 0.5rem;
        margin-bottom: 1rem;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    [data-theme="light"] .hero-tagline {
        color: #2A1220;
        text-shadow: none;
    }

    /* Sub-line */
    .hero-subline {
        font-family: var(--font-body);
        font-weight: 400;
        font-size: clamp(1rem, 2.2vw, 1.25rem);
        color: var(--lilac);
        max-width: 680px;
        margin: 0 auto 2.5rem;
        line-height: 1.5;
    }

    [data-theme="light"] .hero-subline {
        color: #5C4A70;
    }

    /* Hero Buttons */
    .hero-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 1.2rem;
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 5;
    }

    .btn {
        font-family: var(--font-body);
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.9rem 2.2rem;
        border-radius: 9999px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--neon), var(--amber));
        color: #1A0B14;
        border: none;
        box-shadow: 0 4px 20px rgba(255, 143, 199, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 30px rgba(255, 143, 199, 0.6), 0 0 15px rgba(232, 146, 46, 0.5);
    }

    .btn-secondary {
        background: transparent;
        color: var(--pink);
        border: 2px solid var(--pink);
    }

    .btn-secondary:hover {
        background: rgba(247, 182, 210, 0.15);
        color: var(--neon);
        border-color: var(--neon);
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 0 20px var(--glow-color);
    }

    /* Ambient credit note */
    .bg-credit {
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        color: var(--lilac);
        opacity: 0.7;
        margin-top: 1.8rem;
    }

    /* ==========================================
       INTRO SECTION WITH FADING PHOTO SHOWCASE
       ========================================== */
    .intro-section {
        padding: 5rem 1.5rem;
        position: relative;
        max-width: 1050px;
        margin: 0 auto;
    }

    .intro-card {
        background: var(--card);
        border: 1px solid var(--card-border);
        border-radius: 24px;
        padding: 3rem 2.8rem;
        box-shadow: var(--card-shadow);
        position: relative;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1.15fr 0.85fr;
        gap: 3rem;
        align-items: center;
    }

    .intro-card::before {
        content: '“';
        font-family: var(--font-heading);
        font-size: 8rem;
        line-height: 1;
        position: absolute;
        top: -15px;
        left: 20px;
        color: var(--pink);
        opacity: 0.15;
        pointer-events: none;
    }

    .intro-content {
        position: relative;
        z-index: 2;
        text-align: left;
    }

    .intro-tag {
        font-family: var(--font-heading);
        font-style: italic;
        font-size: 1.4rem;
        color: var(--amber);
        margin-bottom: 1rem;
        display: inline-block;
        letter-spacing: 0.04em;
    }

    .intro-text {
        font-family: var(--font-body);
        font-weight: 300;
        font-size: 1.2rem;
        line-height: 1.8;
        color: var(--text);
        margin-bottom: 1.2rem;
    }

    .intro-photo-credit {
        font-size: 0.8rem;
        color: var(--lilac);
        opacity: 0.8;
        margin-bottom: 1.4rem;
        display: block;
    }

    .intro-flourish {
        font-family: var(--font-display);
        font-size: 2.2rem;
        color: var(--pink);
        text-shadow: 0 0 10px var(--glow-color);
    }

    /* 3 Pictures Fading Showcase in 1 Card */
    .intro-fader-frame {
        position: relative;
        width: 100%;
        max-width: 360px;
        aspect-ratio: 4 / 5;
        margin: 0 auto;
        border-radius: 18px;
        overflow: hidden;
        border: 2px solid var(--pink);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4), 0 0 30px var(--glow-color);
        background: #150811;
        cursor: pointer;
        transition: transform 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease;
    }

    .intro-fader-frame:hover {
        transform: translateY(-4px) scale(1.02);
        border-color: var(--neon);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.5), 0 0 45px var(--glow-color);
    }

    [data-theme="light"] .intro-fader-frame {
        border-color: var(--pink);
        box-shadow: 0 12px 35px rgba(42, 18, 32, 0.15), 0 0 25px var(--glow-color);
        background: #FAF3EE;
    }

    .intro-fader-slide {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        transition: opacity 1.2s cubic-bezier(0.4, 0, 0.2, 1), transform 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        transform: scale(1.03);
    }

    .intro-fader-slide.active {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }

    .intro-fader-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .intro-fader-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(26, 11, 20, 0) 60%, rgba(26, 11, 20, 0.7) 100%);
        pointer-events: none;
        z-index: 2;
    }

    .intro-fader-caption {
        position: absolute;
        bottom: 28px;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 3;
        font-family: var(--font-body);
        font-size: 0.8rem;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #FBEFE6;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.8);
    }

    .intro-fader-dots {
        position: absolute;
        bottom: 12px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 6px;
        z-index: 3;
    }

    .intro-fader-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .intro-fader-dot.active {
        background: var(--neon);
        width: 22px;
        border-radius: 6px;
        box-shadow: 0 0 8px var(--neon);
    }

    @media (max-width: 860px) {
        .intro-card {
            grid-template-columns: 1fr;
            text-align: center;
            padding: 2.5rem 1.8rem;
            gap: 2.2rem;
        }

        .intro-content {
            text-align: center;
        }

        .intro-fader-frame {
            max-width: 320px;
        }
    }

    /* ==========================================
       ALBUM FEATURE: POSTER 1 STYLE
       Title in bold soft pink Jost + 14 Tracks
       ========================================== */
    .album-section {
        padding: 5rem 1.5rem 6rem;
        background: linear-gradient(180deg, var(--bg) 0%, rgba(42, 18, 32, 0.4) 50%, var(--bg) 100%);
        position: relative;
    }

    .album-poster-1 {
        max-width: 1050px;
        margin: 0 auto;
        background: var(--card);
        border: 2px solid var(--border-color);
        border-radius: 24px;
        padding: 3.5rem 2.5rem;
        box-shadow: var(--card-shadow), 0 0 40px rgba(27, 143, 163, 0.1);
        position: relative;
    }

    .poster-header {
        text-align: center;
        border-bottom: 2px dashed var(--border-color);
        padding-bottom: 2.5rem;
        margin-bottom: 3rem;
    }

    .poster-eyebrow {
        font-family: var(--font-heading);
        font-style: italic;
        font-size: 1.25rem;
        color: var(--amber);
        margin-bottom: 0.5rem;
        letter-spacing: 0.05em;
    }

    /* Title in bold soft pink Jost */
    .album-title-jost {
        font-family: var(--font-body);
        font-weight: 600;
        font-size: clamp(2rem, 5vw, 3.2rem);
        color: var(--pink);
        letter-spacing: -0.01em;
        line-height: 1.15;
        margin-bottom: 0.8rem;
    }

    /* Release line in light type */
    .album-release-line {
        font-family: var(--font-body);
        font-weight: 300;
        font-size: 1.05rem;
        color: var(--text);
        opacity: 0.8;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    /* Tracklist Layout */
    .tracklist-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem 2rem;
    }

    @media (max-width: 768px) {
        .tracklist-container {
            grid-template-columns: 1fr;
        }
    }

    .track-item {
        display: flex;
        align-items: center;
        padding: 0.85rem 1.2rem;
        border-radius: 12px;
        background: rgba(247, 182, 210, 0.04);
        border: 1px solid transparent;
        transition: all 0.3s ease;
        text-decoration: none;
        color: var(--text);
    }

    .track-item:hover {
        background: rgba(247, 182, 210, 0.12);
        border-color: var(--pink);
        transform: translateX(4px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .track-number {
        font-family: var(--font-body);
        font-weight: 600;
        font-size: 0.95rem;
        color: var(--amber);
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(232, 146, 46, 0.15);
        border-radius: 8px;
        margin-right: 1.2rem;
        flex-shrink: 0;
    }

    .track-name {
        font-family: var(--font-body);
        font-weight: 400;
        font-size: 1.05rem;
        flex: 1;
        letter-spacing: 0.02em;
    }

    .track-tag {
        font-size: 0.75rem;
        font-weight: 500;
        color: var(--pink);
        background: rgba(247, 182, 210, 0.1);
        padding: 0.2rem 0.6rem;
        border-radius: 4px;
        letter-spacing: 0.05em;
    }

    /* ==========================================
       HIGHLIGHTS ROW (THREE CARDS)
       ========================================== */
    .highlights-section {
        padding: 5rem 1.5rem 6rem;
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
    }

    .section-header {
        text-align: center;
        margin-bottom: 3.5rem;
    }

    .section-heading-serif {
        font-family: var(--font-heading);
        font-style: italic;
        font-weight: 600;
        font-size: clamp(2.2rem, 5vw, 3.4rem);
        color: var(--pink);
        margin-bottom: 0.5rem;
    }

    .section-subheading {
        font-family: var(--font-body);
        font-weight: 300;
        font-size: 1.1rem;
        color: var(--lilac);
    }

    .highlights-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    @media (max-width: 900px) {
        .highlights-grid {
            grid-template-columns: 1fr;
            max-width: 500px;
            margin: 0 auto;
        }
    }

    .highlight-card {
        background: var(--card);
        border: 1px solid var(--card-border);
        border-radius: 18px;
        padding: 2.2rem 1.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: transform 0.35s ease, box-shadow 0.35s ease, border-color 0.35s ease;
        text-decoration: none;
        color: inherit;
    }

    .highlight-card:hover {
        transform: translateY(-8px);
        border-color: var(--neon);
        box-shadow: 0 15px 35px rgba(255, 143, 199, 0.2);
    }

    .highlight-card h3 {
        font-family: var(--font-heading);
        font-weight: 600;
        font-size: 1.7rem;
        color: var(--pink);
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .highlight-card p {
        font-family: var(--font-body);
        font-weight: 300;
        font-size: 1.05rem;
        color: var(--text);
        line-height: 1.6;
        margin-bottom: 1.8rem;
        flex: 1;
    }

    .highlight-card-action {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.4rem;
        flex-wrap: nowrap;
        margin-top: auto;
    }

    .spotify-tag {
        font-family: var(--font-body);
        font-size: 0.68rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: var(--amber);
        background: rgba(232, 146, 46, 0.12);
        border: 1px solid rgba(232, 146, 46, 0.3);
        padding: 0.3rem 0.55rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.2rem;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .highlight-card:hover .spotify-tag {
        color: var(--neon);
        background: rgba(255, 143, 199, 0.18);
        border-color: var(--neon);
        box-shadow: 0 0 12px rgba(255, 143, 199, 0.35);
        transform: translateY(-1px);
    }

    .highlight-badge {
        display: inline-block;
        font-family: var(--font-body);
        font-weight: 600;
        font-size: 0.68rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 0.3rem 0.65rem;
        border-radius: 50px;
        background: rgba(247, 182, 210, 0.12);
        color: var(--neon);
        border: 1px solid var(--border-color);
        white-space: nowrap;
        flex-shrink: 0;
    }

    /* ==========================================
       JS FEATURE: IMAGE & MOOD SLIDER
       Stage shots, album art & sparkle aesthetics
       ========================================== */
    .slider-section {
        padding: 3rem 1.5rem 6rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .slider-frame {
        background: var(--card);
        border: 1px solid var(--card-border);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--card-shadow);
        position: relative;
    }

    .slider-viewport {
        position: relative;
        width: 100%;
        height: 420px;
        border-radius: 14px;
        overflow: hidden;
        background: #11050D;
    }

    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.6s ease, visibility 0.6s ease, transform 0.6s ease;
        transform: scale(0.98);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 3rem 2.5rem;
        box-sizing: border-box;
    }

    .slide.active {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }

    /* Beautiful CSS Generated Art / Stage Scenes */
    .slide-1-bg {
        background: radial-gradient(circle at 75% 25%, rgba(232, 146, 46, 0.5) 0%, transparent 50%),
                    radial-gradient(circle at 20% 80%, rgba(255, 143, 199, 0.5) 0%, transparent 60%),
                    linear-gradient(135deg, #2A1220 0%, #1A0B14 100%);
    }

    .slide-2-bg {
        background: radial-gradient(circle at 50% 50%, rgba(27, 143, 163, 0.45) 0%, transparent 60%),
                    radial-gradient(circle at 80% 20%, rgba(255, 143, 199, 0.6) 0%, transparent 50%),
                    linear-gradient(135deg, #1A0B14 0%, #3B1028 100%);
    }

    .slide-3-bg {
        background: radial-gradient(circle at 30% 30%, rgba(183, 166, 230, 0.5) 0%, transparent 55%),
                    radial-gradient(circle at 70% 70%, rgba(232, 146, 46, 0.4) 0%, transparent 50%),
                    linear-gradient(135deg, #1F0D1C 0%, #4A163B 100%);
    }

    .slide-art-motif {
        position: absolute;
        top: 40px;
        right: 40px;
        font-family: var(--font-display);
        font-size: 7rem;
        color: rgba(255, 255, 255, 0.1);
        user-select: none;
        pointer-events: none;
    }

    .slide-badge {
        font-family: var(--font-body);
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: var(--amber);
        margin-bottom: 0.5rem;
    }

    .slide-title {
        font-family: var(--font-heading);
        font-style: italic;
        font-size: 2.2rem;
        color: var(--pink);
        margin-bottom: 0.6rem;
    }

    .slide-desc {
        font-family: var(--font-body);
        font-weight: 300;
        font-size: 1.05rem;
        color: #FBEFE6;
        max-width: 600px;
    }

    /* Slider Controls */
    .slider-controls {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1.5rem;
    }

    .slider-nav-btns {
        display: flex;
        gap: 0.8rem;
    }

    .slider-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(247, 182, 210, 0.1);
        border: 1px solid var(--border-color);
        color: var(--pink);
        font-size: 1.2rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .slider-btn:hover {
        background: var(--pink);
        color: var(--btn-text);
        box-shadow: 0 0 15px var(--glow-color);
        transform: scale(1.05);
    }

    .slider-dots {
        display: flex;
        gap: 0.6rem;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(247, 182, 210, 0.25);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .dot.active {
        background: var(--pink);
        width: 32px;
        border-radius: 10px;
        box-shadow: 0 0 10px var(--glow-color);
    }


</style>
@endpush

@section('content')
<div class="page-wrapper">

    <!-- Ambient Sparkles Container -->
    <div class="sparkle-canvas" aria-hidden="true">
        <span class="sparkle" style="top: 12%; left: 8%; font-size: 1.8rem; animation-delay: 0s;">✦</span>
        <span class="sparkle" style="top: 25%; right: 12%; font-size: 2.2rem; animation-delay: 1.2s;">✧</span>
        <span class="sparkle" style="top: 48%; left: 15%; font-size: 1.4rem; animation-delay: 0.6s;">★</span>
        <span class="sparkle" style="top: 70%; right: 10%; font-size: 2rem; animation-delay: 1.8s;">✦</span>
        <span class="sparkle" style="top: 85%; left: 22%; font-size: 1.5rem; animation-delay: 2.2s;">✧</span>
        <span class="sparkle" style="top: 35%; left: 85%; font-size: 1.6rem; animation-delay: 0.9s;">★</span>
    </div>

    <!-- ========================================================
         HERO SECTION (POSTER 3 STYLE)
         Glowing script wordmark + Lowercase serif tagline + Sub-line + Buttons
         ======================================================== -->
    <section class="hero-poster-3" id="hero">
        <div class="hero-frame">
            <span class="hero-badge">Midwest Royalty • Fan Edition</span>
            
            <!-- Glowing script wordmark: Chappell Roan -->
            <h1 class="hero-wordmark">Chappell Roan</h1>
            
            <!-- Lowercase serif tagline: the rise and fall of a midwest princess -->
            <p class="hero-tagline">the rise and fall of a midwest princess</p>
            
            <!-- Sub-line: Pop, pageants, and pink ponies from Willard, Missouri. -->
            <p class="hero-subline">Pop, pageants, and pink ponies from Willard, Missouri.</p>
            
            <!-- Buttons: Listen to the Album & Meet the Princess -->
            <div class="hero-buttons">
                <a href="#tracklist" class="btn btn-primary">
                    Listen to the Album
                </a>
                <a href="/about" class="btn btn-secondary">
                    Meet the Princess
                </a>
            </div>

            <!-- Background credit note -->
            <p class="bg-credit">Ambient Visuals: Warm amber and violet haze with twinkling theatrical sparkles (CSS local canvas design).</p>
        </div>
    </section>

    <!-- ========================================================
         INTRO SECTION
         ======================================================== -->
    <section class="intro-section" id="intro">
        <div class="intro-card">
            <!-- Text Content -->
            <div class="intro-content">
                <span class="intro-tag">About The Sensation</span>
                <p class="intro-text">
                    Chappell Roan is an American pop singer-songwriter who turned a Missouri childhood, drag-inspired makeup, and dance-pop songwriting into one of the biggest breakthroughs of the 2020s. This fan site is a class project about the music, the artist, and the world of the album.
                </p>
                <span class="intro-photo-credit">Photography: Local portraits & live performance highlights.</span>
                <div class="intro-flourish">✦ ✧ ✦</div>
            </div>

            <!-- 3 Pictures Fading Showcase in 1 Card -->
            <div class="intro-fader-frame" id="introFader">
                <div class="intro-fader-slide active">
                    <img src="{{ asset('images/chappell-pink-hat.jpg') }}" alt="Chappell Roan with pink glitter cowgirl hat">
                </div>
                <div class="intro-fader-slide">
                    <img src="{{ asset('images/chappell-angel.jpg') }}" alt="Chappell Roan in white angel wings costume">
                </div>
                <div class="intro-fader-slide">
                    <img src="{{ asset('images/chappell-live-stars.jpg') }}" alt="Chappell Roan singing live with stars">
                </div>

                <div class="intro-fader-overlay"></div>
                <div class="intro-fader-caption" id="introCaption">Pink Cowgirl Glam</div>

                <div class="intro-fader-dots" id="introDots">
                    <span class="intro-fader-dot active" data-index="0" aria-label="Photo 1"></span>
                    <span class="intro-fader-dot" data-index="1" aria-label="Photo 2"></span>
                    <span class="intro-fader-dot" data-index="2" aria-label="Photo 3"></span>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         ALBUM FEATURE (POSTER 1 STYLE)
         Title in bold soft pink Jost + Release line + 14 Tracks
         ======================================================== -->
    <section class="album-section" id="tracklist">
        <div class="album-poster-1">
            <div class="poster-header">
                <p class="poster-eyebrow">Debut Studio Masterpiece</p>
                <!-- Title in bold soft pink Jost -->
                <h2 class="album-title-jost">The Rise and Fall of a Midwest Princess</h2>
                <!-- Release line in light type -->
                <p class="album-release-line">Album, 22 September 2023</p>
            </div>

            <!-- Tracklist: 14 Tracks shown as numbered list inside the frame -->
            <div class="tracklist-container">
                <div class="track-item">
                    <span class="track-number">1</span>
                    <span class="track-name">Femininomenon</span>
                    <span class="track-tag">Track 01</span>
                </div>
                <div class="track-item">
                    <span class="track-number">2</span>
                    <span class="track-name">Red Wine Supernova</span>
                    <span class="track-tag">Track 02</span>
                </div>
                <div class="track-item">
                    <span class="track-number">3</span>
                    <span class="track-name">After Midnight</span>
                    <span class="track-tag">Track 03</span>
                </div>
                <div class="track-item">
                    <span class="track-number">4</span>
                    <span class="track-name">Coffee</span>
                    <span class="track-tag">Track 04</span>
                </div>
                <div class="track-item">
                    <span class="track-number">5</span>
                    <span class="track-name">Casual</span>
                    <span class="track-tag">Track 05</span>
                </div>
                <div class="track-item">
                    <span class="track-number">6</span>
                    <span class="track-name">Super Graphic Ultra Modern Girl</span>
                    <span class="track-tag">Track 06</span>
                </div>
                <div class="track-item">
                    <span class="track-number">7</span>
                    <span class="track-name">Hot to Go!</span>
                    <span class="track-tag">Track 07</span>
                </div>
                <div class="track-item">
                    <span class="track-number">8</span>
                    <span class="track-name">My Kink Is Karma</span>
                    <span class="track-tag">Track 08</span>
                </div>
                <div class="track-item">
                    <span class="track-number">9</span>
                    <span class="track-name">Picture You</span>
                    <span class="track-tag">Track 09</span>
                </div>
                <div class="track-item">
                    <span class="track-number">10</span>
                    <span class="track-name">Kaleidoscope</span>
                    <span class="track-tag">Track 10</span>
                </div>
                <div class="track-item">
                    <span class="track-number">11</span>
                    <span class="track-name">Pink Pony Club</span>
                    <span class="track-tag">Track 11</span>
                </div>
                <div class="track-item">
                    <span class="track-number">12</span>
                    <span class="track-name">Naked in Manhattan</span>
                    <span class="track-tag">Track 12</span>
                </div>
                <div class="track-item">
                    <span class="track-number">13</span>
                    <span class="track-name">California</span>
                    <span class="track-tag">Track 13</span>
                </div>
                <div class="track-item">
                    <span class="track-number">14</span>
                    <span class="track-name">Guilty Pleasure</span>
                    <span class="track-tag">Track 14</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================
         HIGHLIGHTS ROW (THREE CARDS)
         Pink Pony Club, Good Luck Babe!, Best New Artist
         ======================================================== -->
    <section class="highlights-section" id="highlights">
        <div class="section-header">
            <h2 class="section-heading-serif">Career Highlights</h2>
            <p class="section-subheading">From underground Missouri dreamer to global queer pop royalty</p>
        </div>

        <div class="highlights-grid">
            <!-- Card 1: Pink Pony Club -->
            <a href="https://open.spotify.com/album/7p5A0E4ivsJ6Gv4iKriANy?si=f7f671f1fb214f38" target="_blank" rel="noopener noreferrer" class="highlight-card" aria-label="Listen to Pink Pony Club on Spotify">
                <div>
                    <h3>Pink Pony Club</h3>
                    <p>The song that made the first big splash and became a fan anthem.</p>
                </div>
                <div class="highlight-card-action">
                    <span class="highlight-badge">Breakout Anthem</span>
                    <span class="spotify-tag">Listen on Spotify ↗</span>
                </div>
            </a>

            <!-- Card 2: Good Luck, Babe! -->
            <a href="https://open.spotify.com/track/0WbMK4wrZ1wFSty9F7FCgu?si=c77d9d778555401a" target="_blank" rel="noopener noreferrer" class="highlight-card" aria-label="Listen to Good Luck, Babe! on Spotify">
                <div>
                    <h3>Good Luck, Babe!</h3>
                    <p>The 2024 single that reached the top five in the US.</p>
                </div>
                <div class="highlight-card-action">
                    <span class="highlight-badge">Top 5 Hit</span>
                    <span class="spotify-tag">Listen on Spotify ↗</span>
                </div>
            </a>

            <!-- Card 3: Best New Artist -->
            <article class="highlight-card">
                <div>
                    <h3>Best New Artist</h3>
                    <p>The 2025 Grammy win.</p>
                </div>
                <div class="highlight-card-action">
                    <span class="highlight-badge">Grammy Award</span>
                </div>
            </article>
        </div>
    </section>

    <!-- ========================================================
         JS REQUIREMENT: INTERACTIVE IMAGE & MOOD SLIDER
         Stage shots, album art & sparkle backgrounds
         ======================================================== -->
    <section class="slider-section" id="gallery">
        <div class="section-header">
            <h2 class="section-heading-serif">Visual Atmosphere</h2>
            <p class="section-subheading">Stage glitter, album aesthetics, and high-camp pageantry</p>
        </div>

        <div class="slider-frame">
            <div class="slider-viewport" id="imageSlider">
                <!-- Slide 1 -->
                <div class="slide slide-1-bg active">
                    <div class="slide-art-motif">✦</div>
                    <span class="slide-badge">Album Era Artwork</span>
                    <h3 class="slide-title">Midwest Pageant Glitter</h3>
                    <p class="slide-desc">Rhinestones, prom sashes, and nostalgic Americana reimagined through a joyful queer lens.</p>
                </div>

                <!-- Slide 2 -->
                <div class="slide slide-2-bg">
                    <div class="slide-art-motif">★</div>
                    <span class="slide-badge">Live Stage Shots</span>
                    <h3 class="slide-title">The Pink Pony Stage</h3>
                    <p class="slide-desc">Electric synchronized dance moves, roaring crowds in pink cowboy hats, and theatrical drag glamour.</p>
                </div>

                <!-- Slide 3 -->
                <div class="slide slide-3-bg">
                    <div class="slide-art-motif">✧</div>
                    <span class="slide-badge">Atmospheric Aesthetics</span>
                    <h3 class="slide-title">Amber & Violet Haze</h3>
                    <p class="slide-desc">Dreamy stage fog, neon club lights, and sparkling crescendos that define the sound of the midwest princess.</p>
                </div>
            </div>

            <div class="slider-controls">
                <div class="slider-dots" id="sliderDots">
                    <span class="dot active" data-index="0"></span>
                    <span class="dot" data-index="1"></span>
                    <span class="dot" data-index="2"></span>
                </div>

                <div class="slider-nav-btns">
                    <button class="slider-btn" id="prevSlide" aria-label="Previous Slide">‹</button>
                    <button class="slider-btn" id="nextSlide" aria-label="Next Slide">›</button>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // ==========================================
        // 3-PICTURE FADING SHOWCASE (ABOUT THE SENSATION)
        // ==========================================
        const introFader = document.getElementById('introFader');
        const introSlides = document.querySelectorAll('.intro-fader-slide');
        const introDots = document.querySelectorAll('.intro-fader-dot');
        const introCaption = document.getElementById('introCaption');
        const introCaptions = ['Pink Cowgirl Glam', 'Angel Wings Pageantry', 'Live on Stage'];
        let introIndex = 0;
        let introTimer;

        function showIntroSlide(idx) {
            introSlides.forEach((slide, i) => {
                slide.classList.toggle('active', i === idx);
            });
            introDots.forEach((dot, i) => {
                dot.classList.toggle('active', i === idx);
            });
            if (introCaption && introCaptions[idx]) {
                introCaption.textContent = introCaptions[idx];
            }
            introIndex = idx;
        }

        function nextIntroSlide() {
            let next = (introIndex + 1) % introSlides.length;
            showIntroSlide(next);
        }

        if (introSlides.length > 0) {
            // Hover trigger: automatically proceed to next image when placing cursor on the frame
            if (introFader) {
                introFader.addEventListener('mouseenter', () => {
                    nextIntroSlide();
                    // Keep fading to subsequent images while hovering without requiring any click
                    clearInterval(introTimer);
                    introTimer = setInterval(nextIntroSlide, 2600);
                });

                introFader.addEventListener('mouseleave', () => {
                    clearInterval(introTimer);
                    introTimer = setInterval(nextIntroSlide, 3500);
                });
            }

            introDots.forEach((dot, i) => {
                dot.addEventListener('click', () => {
                    showIntroSlide(i);
                    clearInterval(introTimer);
                    introTimer = setInterval(nextIntroSlide, 3500);
                });
            });

            introTimer = setInterval(nextIntroSlide, 3500);
        }

        // ==========================================
        // JS REQUIREMENT 1: IMAGE & MOOD SLIDER
        // ==========================================
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.getElementById('prevSlide');
        const nextBtn = document.getElementById('nextSlide');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            currentSlide = index;
        }

        function nextSlide() {
            let nextIndex = (currentSlide + 1) % slides.length;
            showSlide(nextIndex);
        }

        function prevSlide() {
            let prevIndex = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(prevIndex);
        }

        if (nextBtn && prevBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetAutoplay();
            });

            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetAutoplay();
            });

            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => {
                    showSlide(i);
                    resetAutoplay();
                });
            });

            function startAutoplay() {
                slideInterval = setInterval(nextSlide, 5000);
            }

            function resetAutoplay() {
                clearInterval(slideInterval);
                startAutoplay();
            }

            startAutoplay();
        }
    });
</script>
@endpush

