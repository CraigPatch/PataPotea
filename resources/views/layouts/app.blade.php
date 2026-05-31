<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Pata Potea — Tanzania's Lost and Found Platform"/>
    <title>@yield('title', 'Pata Potea Tanzania')</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green-50:  #f0faf3;
            --green-100: #d6f3df;
            --green-200: #aee8c0;
            --green-400: #4caf72;
            --green-500: #2e8b52;
            --green-600: #1d6b3c;
            --green-700: #145030;
            --sand-50:   #faf8f3;
            --sand-100:  #f0ebe0;
            --sand-200:  #ddd4c0;
            --amber-500: #b8891e;
            --text-dark: #0f2218;
            --text-mid:  #2d5040;
            --text-muted:#5a7a68;
            --white:     #ffffff;
            --nav-h:     64px;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--sand-50);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ══════════════════════════════
           NAVBAR
        ══════════════════════════════ */
        .navbar {
            position: sticky; top: 0; z-index: 100;
            height: var(--nav-h);
            background: rgba(240,250,243,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--green-100);
            padding: 0 2rem;
            display: flex; align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
        }

        /* Logo */
        .nav-logo {
            display: flex; align-items: center; gap: 9px;
            text-decoration: none; flex-shrink: 0;
        }
        .nav-logo-icon {
            width: 36px; height: 36px;
            background: var(--green-500);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            transition: background 0.2s;
        }
        .nav-logo:hover .nav-logo-icon { background: var(--green-600); }
        .nav-logo-icon svg { width: 20px; height: 20px; fill: white; }
        .nav-brand {
            font-family: 'Playfair Display', serif;
            font-size: 19px; font-weight: 700;
            color: var(--green-700);
        }
        .nav-brand span { color: var(--amber-500); }

        /* Search bar */
        .nav-search {
            flex: 1; max-width: 340px;
            display: flex; align-items: center;
            background: var(--green-50);
            border: 1.5px solid var(--green-200);
            border-radius: 100px;
            padding: 0 14px; gap: 8px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .nav-search:focus-within {
            border-color: var(--green-400);
            box-shadow: 0 0 0 3px rgba(76,175,114,0.12);
        }
        .nav-search svg {
            width: 15px; height: 15px;
            stroke: var(--text-muted); fill: none;
            stroke-width: 2; flex-shrink: 0;
        }
        .nav-search input {
            border: none; background: transparent;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px; color: var(--text-dark);
            outline: none; width: 100%; padding: 9px 0;
        }
        .nav-search input::placeholder { color: var(--text-muted); }

        /* Nav links */
        .nav-links {
            display: flex; align-items: center; gap: 1.5rem;
            flex-shrink: 0;
        }
        .nav-links a {
            font-size: 14px; font-weight: 500;
            color: var(--text-mid); text-decoration: none;
            transition: color 0.2s; white-space: nowrap;
        }
        .nav-links a:hover { color: var(--green-500); }
        .nav-links a.active { color: var(--green-500); font-weight: 600; }

        /* Nav auth buttons */
        .nav-auth { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
        .btn-nav-ghost {
            background: transparent;
            border: 1.5px solid var(--green-200);
            color: var(--green-600); border-radius: 8px;
            padding: 7px 16px; font-family: 'DM Sans', sans-serif;
            font-size: 13px; font-weight: 600;
            cursor: pointer; text-decoration: none;
            transition: all 0.2s;
        }
        .btn-nav-ghost:hover {
            background: var(--green-50);
            border-color: var(--green-400);
        }
        .btn-nav-solid {
            background: var(--green-500); color: white;
            border: none; border-radius: 8px;
            padding: 8px 16px; font-family: 'DM Sans', sans-serif;
            font-size: 13px; font-weight: 600;
            cursor: pointer; text-decoration: none;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-nav-solid:hover {
            background: var(--green-600);
            transform: translateY(-1px);
        }

        /* User dropdown */
        .nav-user { position: relative; }
        .nav-user-btn {
            display: flex; align-items: center; gap: 8px;
            background: var(--green-50);
            border: 1.5px solid var(--green-200);
            border-radius: 100px; padding: 5px 14px 5px 6px;
            cursor: pointer; transition: all 0.2s;
            font-family: 'DM Sans', sans-serif;
        }
        .nav-user-btn:hover {
            border-color: var(--green-400);
            background: var(--green-100);
        }
        .nav-avatar {
            width: 28px; height: 28px;
            background: var(--green-500);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 700; color: white;
        }
        .nav-user-name { font-size: 13px; font-weight: 600; color: var(--text-dark); }
        .nav-chevron {
            width: 14px; height: 14px;
            stroke: var(--text-muted); fill: none; stroke-width: 2;
            transition: transform 0.2s;
        }
        .nav-user.open .nav-chevron { transform: rotate(180deg); }

        /* Dropdown menu */
        .dropdown-menu {
            position: absolute; top: calc(100% + 8px); right: 0;
            background: white;
            border: 1px solid var(--green-100);
            border-radius: 14px;
            box-shadow: 0 12px 40px rgba(20,80,48,0.12);
            min-width: 200px; overflow: hidden;
            opacity: 0; transform: translateY(-8px);
            pointer-events: none;
            transition: opacity 0.2s ease, transform 0.2s ease;
            z-index: 200;
        }
        .nav-user.open .dropdown-menu {
            opacity: 1; transform: translateY(0);
            pointer-events: all;
        }
        .dropdown-header {
            padding: 14px 16px 10px;
            border-bottom: 1px solid var(--green-100);
        }
        .dropdown-header .d-name { font-size: 14px; font-weight: 600; color: var(--text-dark); }
        .dropdown-header .d-email { font-size: 12px; color: var(--text-muted); }
        .dropdown-item {
            display: flex; align-items: center; gap: 10px;
            padding: 11px 16px;
            font-size: 13px; font-weight: 500;
            color: var(--text-mid); text-decoration: none;
            transition: background 0.15s;
        }
        .dropdown-item:hover { background: var(--green-50); color: var(--green-600); }
        .dropdown-item svg {
            width: 15px; height: 15px;
            stroke: currentColor; fill: none; stroke-width: 1.8;
        }
        .dropdown-divider { height: 1px; background: var(--green-100); margin: 4px 0; }
        .dropdown-item.logout { color: #c0392b; }
        .dropdown-item.logout:hover { background: #fff5f5; }

        /* Mobile menu toggle */
        .nav-mobile-toggle {
            display: none; background: none; border: none;
            cursor: pointer; padding: 6px;
        }
        .nav-mobile-toggle svg {
            width: 22px; height: 22px;
            stroke: var(--text-mid); fill: none; stroke-width: 2;
        }

        /* Mobile nav drawer */
        .mobile-nav {
            display: none;
            position: fixed; top: var(--nav-h); left: 0; right: 0;
            background: white; border-bottom: 1px solid var(--green-100);
            padding: 1rem 1.5rem 1.5rem;
            box-shadow: 0 8px 24px rgba(20,80,48,0.08);
            z-index: 99;
            flex-direction: column; gap: 6px;
        }
        .mobile-nav.open { display: flex; }
        .mobile-nav a, .mobile-nav button {
            display: block; padding: 10px 12px;
            font-size: 15px; font-weight: 500;
            color: var(--text-mid); text-decoration: none;
            border-radius: 8px; transition: background 0.15s;
            background: none; border: none; text-align: left;
            font-family: 'DM Sans', sans-serif; cursor: pointer; width: 100%;
        }
        .mobile-nav a:hover, .mobile-nav button:hover { background: var(--green-50); color: var(--green-600); }
        .mobile-nav-search {
            display: flex; align-items: center; gap: 8px;
            background: var(--green-50); border: 1.5px solid var(--green-200);
            border-radius: 10px; padding: 0 14px; margin-bottom: 8px;
        }
        .mobile-nav-search svg { width: 15px; height: 15px; stroke: var(--text-muted); fill: none; stroke-width: 2; }
        .mobile-nav-search input {
            border: none; background: transparent; padding: 11px 0;
            font-family: 'DM Sans', sans-serif; font-size: 14px; outline: none; width: 100%;
        }

        /* ══════════════════════════════
           FLASH MESSAGES
        ══════════════════════════════ */
        .flash-wrap { max-width: 900px; margin: 1.2rem auto 0; padding: 0 2rem; }
        .flash {
            display: flex; align-items: center; gap: 10px;
            padding: 12px 16px; border-radius: 10px;
            font-size: 14px; font-weight: 500;
        }
        .flash-success {
            background: var(--green-100);
            border: 1px solid var(--green-200);
            color: var(--green-700);
        }
        .flash-error {
            background: #fff0f0;
            border: 1px solid #fcc;
            color: #c0392b;
        }
        .flash svg { width: 16px; height: 16px; flex-shrink: 0; }
        .flash-close {
            margin-left: auto; background: none; border: none;
            cursor: pointer; color: inherit; opacity: 0.6;
            font-size: 18px; line-height: 1; padding: 0 2px;
        }
        .flash-close:hover { opacity: 1; }

        /* ══════════════════════════════
           MAIN CONTENT
        ══════════════════════════════ */
        main { min-height: calc(100vh - var(--nav-h) - 280px); }

        /* ══════════════════════════════
           FOOTER
        ══════════════════════════════ */
        .footer {
            background: var(--text-dark);
            color: rgba(255,255,255,0.65);
            padding: 3rem 2rem 1.5rem;
            margin-top: 4rem;
        }
        .footer-grid {
            max-width: 1100px; margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 2.5rem;
            padding-bottom: 2.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .footer-brand-col .footer-logo {
            display: flex; align-items: center; gap: 9px; margin-bottom: 1rem;
        }
        .footer-logo-icon {
            width: 34px; height: 34px;
            background: var(--green-500); border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
        }
        .footer-logo-icon svg { width: 18px; height: 18px; fill: white; }
        .footer-logo-name {
            font-family: 'Playfair Display', serif;
            font-size: 17px; font-weight: 700; color: var(--green-200);
        }
        .footer-logo-name span { color: #fac775; }
        .footer-tagline {
            font-size: 13px; line-height: 1.7;
            color: rgba(255,255,255,0.5); max-width: 240px;
        }
        .footer-cities {
            display: flex; flex-wrap: wrap; gap: 6px; margin-top: 1rem;
        }
        .city-tag {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 100px; padding: 3px 10px;
            font-size: 11px; color: rgba(255,255,255,0.5);
        }
        .footer-col h4 {
            font-size: 12px; font-weight: 700;
            color: rgba(255,255,255,0.9);
            text-transform: uppercase; letter-spacing: 0.08em;
            margin-bottom: 1rem;
        }
        .footer-col a {
            display: block; font-size: 13px;
            color: rgba(255,255,255,0.5); text-decoration: none;
            margin-bottom: 8px; transition: color 0.2s;
        }
        .footer-col a:hover { color: var(--green-200); }
        .footer-bottom {
            max-width: 1100px; margin: 1.5rem auto 0;
            display: flex; align-items: center;
            justify-content: space-between; flex-wrap: wrap; gap: 1rem;
        }
        .footer-copy { font-size: 12px; color: rgba(255,255,255,0.3); }
        .footer-flag { font-size: 13px; color: rgba(255,255,255,0.4); }

        /* ══════════════════════════════
           RESPONSIVE
        ══════════════════════════════ */
        @media (max-width: 900px) {
            .nav-search { display: none; }
            .nav-links  { display: none; }
            .nav-mobile-toggle { display: block; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 580px) {
            .navbar { padding: 0 1rem; }
            .footer-grid { grid-template-columns: 1fr; }
        }

        /* ══════════════════════════════
           YIELD SLOTS for page CSS
        ══════════════════════════════ */
        @yield('styles')
    </style>
    @yield('head')
</head>
<body>

{{-- ══ NAVBAR ══ --}}
<nav class="navbar">

    {{-- Logo --}}
    <a href="{{ route('home') }}" class="nav-logo">
        <div class="nav-logo-icon">
            <svg viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/>
            </svg>
        </div>
        <span class="nav-brand">Pata <span>Potea</span></span>
    </a>

    {{-- Search bar --}}
    <form action="{{ route('items.search') }}" method="GET" class="nav-search">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        <input type="text" name="q"
               value="{{ request('q') }}"
               placeholder="Search lost or found items…"/>
    </form>

    {{-- Desktop links --}}
    <div class="nav-links">
        <a href="{{ route('home') }}"
           class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        <a href="{{ route('items.search') }}"
           class="{{ request()->routeIs('items.search') ? 'active' : '' }}">Browse Items</a>
        <a href="#how-it-works">How It Works</a>
    </div>

    {{-- Auth area --}}
    <div class="nav-auth">
        @guest
            <a href="{{ route('login') }}" class="btn-nav-ghost">Sign In</a>
            <a href="{{ route('register') }}" class="btn-nav-solid">Register</a>
        @endguest

        @auth
            {{-- Post item button --}}
            <a href="{{ route('items.create') }}" class="btn-nav-solid">
                + Post Item
            </a>

            {{-- User dropdown --}}
            <div class="nav-user" id="navUser">
                <button class="nav-user-btn" onclick="toggleDropdown()">
                    <div class="nav-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="nav-user-name">
                        {{ explode(' ', Auth::user()->name)[0] }}
                    </span>
                    <svg class="nav-chevron" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>

                <div class="dropdown-menu">
                    <div class="dropdown-header">
                        <div class="d-name">{{ Auth::user()->name }}</div>
                        <div class="d-email">{{ Auth::user()->email }}</div>
                    </div>
                    <a href="{{ route('dashboard') }}" class="dropdown-item">
                        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('items.index') }}" class="dropdown-item">
                        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        My Listings
                    </a>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        My Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item logout">
                            <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        @endauth
    </div>

    {{-- Mobile toggle --}}
    <button class="nav-mobile-toggle" onclick="toggleMobileNav()" aria-label="Menu">
        <svg id="menuIcon" viewBox="0 0 24 24"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
    </button>
</nav>

{{-- ══ MOBILE DRAWER ══ --}}
<div class="mobile-nav" id="mobileNav">
    <div class="mobile-nav-search">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        <input type="text" placeholder="Search items…"/>
    </div>
    <a href="{{ route('home') }}">🏠 Home</a>
    <a href="{{ route('items.search') }}">🔍 Browse Items</a>
    <a href="#how-it-works">💡 How It Works</a>
    @guest
        <a href="{{ route('login') }}">🔑 Sign In</a>
        <a href="{{ route('register') }}">✨ Register</a>
    @endguest
    @auth
        <a href="{{ route('dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('items.create') }}">➕ Post Item</a>
        <a href="{{ route('profile.edit') }}">👤 My Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">🚪 Sign Out</button>
        </form>
    @endauth
</div>

{{-- ══ FLASH MESSAGES ══ --}}
@if(session('success') || session('error'))
    <div class="flash-wrap">
        @if(session('success'))
            <div class="flash flash-success">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                {{ session('success') }}
                <button class="flash-close" onclick="this.parentElement.remove()">×</button>
            </div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ session('error') }}
                <button class="flash-close" onclick="this.parentElement.remove()">×</button>
            </div>
        @endif
    </div>
@endif

{{-- ══ PAGE CONTENT ══ --}}
<main>
    @yield('content')
</main>

{{-- ══ FOOTER ══ --}}
<footer class="footer">
    <div class="footer-grid">

        {{-- Brand col --}}
        <div class="footer-brand-col">
            <div class="footer-logo">
                <div class="footer-logo-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/></svg>
                </div>
                <span class="footer-logo-name">Pata <span>Potea</span></span>
            </div>
            <p class="footer-tagline">
                Tanzania's trusted lost & found platform. Helping communities reunite people with their belongings since 2025.
            </p>
            <div class="footer-cities">
                @foreach(['Dar es Salaam','Arusha','Mwanza','Dodoma','Tanga','Zanzibar','Mbeya','Moshi'] as $city)
                    <span class="city-tag">{{ $city }}</span>
                @endforeach
            </div>
        </div>

        {{-- Platform links --}}
        <div class="footer-col">
            <h4>Platform</h4>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('items.search') }}">Browse Items</a>
            <a href="{{ route('items.create') }}">Post an Item</a>
            <a href="#how-it-works">How It Works</a>
        </div>

        {{-- Account links --}}
        <div class="footer-col">
            <h4>Account</h4>
            @guest
                <a href="{{ route('register') }}">Create Account</a>
                <a href="{{ route('login') }}">Sign In</a>
            @endguest
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('items.index') }}">My Listings</a>
                <a href="{{ route('profile.edit') }}">My Profile</a>
            @endauth
        </div>

        {{-- Help links --}}
        <div class="footer-col">
            <h4>Help</h4>
            <a href="#">Safety Guidelines</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
            <a href="#">Contact Us</a>
        </div>

    </div>

    <div class="footer-bottom">
        <span class="footer-copy">© {{ date('Y') }} Pata Potea Tanzania. All rights reserved.</span>
        <span class="footer-flag">🇹🇿 Made for Tanzania</span>
    </div>
</footer>

<script>
    // Dropdown toggle
    function toggleDropdown() {
        document.getElementById('navUser').classList.toggle('open');
    }
    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        const navUser = document.getElementById('navUser');
        if (navUser && !navUser.contains(e.target)) {
            navUser.classList.remove('open');
        }
    });

    // Mobile nav toggle
    function toggleMobileNav() {
        document.getElementById('mobileNav').classList.toggle('open');
    }

    // Auto-hide flash messages after 4 seconds
    setTimeout(() => {
        document.querySelectorAll('.flash').forEach(el => {
            el.style.transition = 'opacity 0.5s ease';
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500);
        });
    }, 4000);
</script>

@yield('scripts')
</body>
</html>