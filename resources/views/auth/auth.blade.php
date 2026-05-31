<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Pata Potea — Sign In or Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: #e8f5ed;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 1rem;
        }

        .card {
            width: 100%;
            max-width: 880px;
            min-height: 540px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 24px 64px rgba(20,80,48,0.16);
            position: relative;
            background: white;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ── Forms side (always right) ── */
        .forms-side {
            position: relative;
            overflow: hidden;
            min-height: 540px;
        }

        /* both forms sit on top of each other */
        .form-panel {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            padding: 2.4rem 2.6rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
            backface-visibility: hidden;
            transition: transform 0.7s cubic-bezier(0.77, 0, 0.175, 1),
                        opacity 0.4s ease;
        }

        /* Login: default visible */
        .login-form {
            transform: rotateY(0deg);
            opacity: 1;
            pointer-events: all;
            z-index: 2;
        }

        /* Register: hidden behind, rotated */
        .register-form {
            transform: rotateY(180deg);
            opacity: 0;
            pointer-events: none;
            z-index: 1;
        }

        /* When switching to register */
        .forms-side.show-register .login-form {
            transform: rotateY(-180deg);
            opacity: 0;
            pointer-events: none;
        }
        .forms-side.show-register .register-form {
            transform: rotateY(0deg);
            opacity: 1;
            pointer-events: all;
            z-index: 2;
        }

        /* ── Green panel (always left) ── */
        .green-panel {
            background: #1d6b3c;
            padding: 2.5rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            z-index: 5;
        }

        .brand { display: flex; align-items: center; gap: 9px; margin-bottom: 1.5rem; }
        .brand-icon {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.15);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
        }
        .brand-icon svg { width: 20px; height: 20px; fill: white; }
        .brand-name { font-family: 'Playfair Display', serif; font-size: 19px; font-weight: 700; color: white; }
        .brand-name span { color: #fac775; }

        .panel-content { transition: opacity 0.3s ease, transform 0.3s ease; }
        .panel-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem; font-weight: 900;
            color: white; line-height: 1.25; margin-bottom: .75rem;
        }
        .panel-content p { color: rgba(255,255,255,0.72); font-size: 13.5px; line-height: 1.7; }

        .panel-stats { display: flex; flex-direction: column; gap: 10px; }
        .stat-row {
            display: flex; align-items: center; gap: 10px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 11px; padding: 11px 13px;
        }
        .stat-icon {
            width: 30px; height: 30px;
            background: rgba(255,255,255,0.12);
            border-radius: 7px;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; flex-shrink: 0;
        }
        .stat-text { color: rgba(255,255,255,0.8); font-size: 12px; line-height: 1.4; }
        .stat-text strong { color: white; font-weight: 600; display: block; font-size: 13px; }

        /* ── Switch button with spin animation ── */
        .switch-btn {
            display: inline-flex; align-items: center; gap: 6px;
            background: none; border: none;
            color: #2e8b52; font-weight: 600; font-size: 13px;
            cursor: pointer; padding: 0;
            font-family: 'DM Sans', sans-serif;
            text-decoration: underline;
            transition: color 0.2s;
        }
        .switch-btn:hover { color: #1d6b3c; }
        .switch-btn .spin-icon {
            display: inline-block;
            transition: transform 0.7s cubic-bezier(0.77, 0, 0.175, 1);
        }
        .switch-btn:hover .spin-icon {
            transform: rotate(360deg);
        }

        /* ── Form elements ── */
        h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.45rem; font-weight: 700;
            color: #0f2218; margin-bottom: 4px;
        }
        .sub { font-size: 13px; color: #5a7a68; margin-bottom: 1.4rem; }

        .fg { margin-bottom: .85rem; }
        .fg label { display: block; font-size: 12px; font-weight: 600; color: #2d5040; margin-bottom: 5px; }
        .fg input, .fg select {
            width: 100%;
            border: 1.5px solid #aee8c0;
            border-radius: 9px;
            padding: 10px 13px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px; color: #0f2218;
            background: #f0faf3; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .fg input:focus, .fg select:focus {
            border-color: #2e8b52;
            box-shadow: 0 0 0 3px rgba(46,139,82,0.1);
            background: white;
        }
        .fg .error { font-size: 11px; color: #c0392b; margin-top: 3px; }

        .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }

        .form-foot {
            display: flex; align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .form-foot label {
            display: flex; align-items: center;
            gap: 6px; font-size: 12px; color: #5a7a68; cursor: pointer;
        }
        .form-foot input[type=checkbox] { accent-color: #2e8b52; }
        .form-foot a { font-size: 12px; color: #2e8b52; font-weight: 600; text-decoration: none; }
        .form-foot a:hover { text-decoration: underline; }

        .btn {
            width: 100%; background: #2e8b52; color: white;
            border: none; border-radius: 9px;
            padding: 12px; font-family: 'DM Sans', sans-serif;
            font-size: 14px; font-weight: 600;
            cursor: pointer; transition: background 0.2s, transform 0.15s;
        }
        .btn:hover { background: #1d6b3c; transform: translateY(-1px); }

        .session-msg {
            background: #d6f3df; border: 1px solid #aee8c0;
            color: #1d6b3c; border-radius: 9px;
            padding: 9px 13px; font-size: 12px; margin-bottom: 1rem;
        }

        @media (max-width: 640px) {
            .card { grid-template-columns: 1fr; }
            .green-panel { display: none; }
            .forms-side { min-height: 600px; }
        }
    </style>
</head>
<body>

<div class="card">

    {{-- ── LEFT: Green panel (static) ── --}}
    <div class="green-panel">
        <div>
            <div class="brand">
                <div class="brand-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/>
                    </svg>
                </div>
                <span class="brand-name">Pata <span>Potea</span></span>
            </div>
            <div class="panel-content" id="panelContent">
                <h2>Welcome back to Pata Potea</h2>
                <p>Sign in to manage your listings, track claims and connect with your community across Tanzania.</p>
            </div>
        </div>
        <div class="panel-stats">
            <div class="stat-row">
                <div class="stat-icon">📦</div>
                <div class="stat-text">
                    <strong>1,240+ Items Reported</strong>
                    Across all major Tanzanian cities
                </div>
            </div>
            <div class="stat-row">
                <div class="stat-icon">🤝</div>
                <div class="stat-text">
                    <strong>870+ Items Reunited</strong>
                    Thanks to our community
                </div>
            </div>
            <div class="stat-row">
                <div class="stat-icon">🛡️</div>
                <div class="stat-text">
                    <strong>Safe & Secure</strong>
                    Your privacy is protected
                </div>
            </div>
        </div>
    </div>

    {{-- ── RIGHT: Forms side (login & register swap here) ── --}}
    <div class="forms-side {{ $errors->has('name') || $errors->has('phone_number') ? 'show-register' : '' }}"
         id="formsSide">

        {{-- LOGIN form --}}
        <div class="form-panel login-form" id="loginForm">
            <h3>Sign in to your account</h3>
            <p class="sub">
                No account yet?
                <button type="button" class="switch-btn" onclick="switchTo('register')">
                    <span class="spin-icon">✦</span> Create one free
                </button>
            </p>

            @if (session('status'))
                <div class="session-msg">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="fg">
                    <label>Email Address</label>
                    <input type="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="amina@gmail.com"
                           required autofocus/>
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="fg">
                    <label>Password</label>
                    <input type="password" name="password"
                           placeholder="Your password" required/>
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="form-foot">
                    <label>
                        <input type="checkbox" name="remember"/> Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>
                <button type="submit" class="btn">Sign In →</button>
            </form>
        </div>

        {{-- REGISTER form --}}
        <div class="form-panel register-form" id="registerForm">
            <h3>Create your account</h3>
            <p class="sub">
                Have an account?
                <button type="button" class="switch-btn" onclick="switchTo('login')">
                    <span class="spin-icon">✦</span> Sign in here
                </button>
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="fg">
                    <label>Full Name</label>
                    <input type="text" name="name"
                           value="{{ old('name') }}"
                           placeholder="e.g. Amina Juma" required/>
                    @error('name') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div class="two-col">
                    <div class="fg">
                        <label>Email Address</label>
                        <input type="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="amina@gmail.com" required/>
                        @error('email') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="fg">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number"
                               value="{{ old('phone_number') }}"
                               placeholder="+255 712 345 678" required/>
                        @error('phone_number') <div class="error">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="two-col">
                    <div class="fg">
                        <label>City</label>
                        <select name="city" required>
                            <option value="" disabled selected>Select city</option>
                            @foreach(['Dar es Salaam','Arusha','Mwanza','Dodoma','Tanga','Morogoro','Zanzibar','Mbeya','Tabora','Kigoma','Moshi','Iringa'] as $city)
                                <option value="{{ $city }}" {{ old('city') == $city ? 'selected' : '' }}>
                                    {{ $city }}
                                </option>
                            @endforeach
                        </select>
                        @error('city') <div class="error">{{ $message }}</div> @enderror
                    </div>
                    <div class="fg">
                        <label>Password</label>
                        <input type="password" name="password"
                               placeholder="Min. 8 characters" required/>
                        @error('password') <div class="error">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="fg">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation"
                           placeholder="Repeat your password" required/>
                </div>
                <button type="submit" class="btn">Create Account →</button>
            </form>
        </div>

    </div>{{-- end .forms-side --}}

</div>{{-- end .card --}}

<script>
const formsSide    = document.getElementById('formsSide');
const panelContent = document.getElementById('panelContent');

const texts = {
    login: {
        h2: 'Welcome back to Pata Potea',
        p:  'Sign in to manage your listings, track claims and connect with your community across Tanzania.'
    },
    register: {
        h2: "Join Tanzania's Lost & Found Community",
        p:  'Help reunite people with their belongings. Create your free account and be part of the solution.'
    }
};

function switchTo(mode) {
    // Animate panel text
    panelContent.style.opacity   = '0';
    panelContent.style.transform = 'translateY(8px)';
    setTimeout(() => {
        panelContent.querySelector('h2').textContent = texts[mode].h2;
        panelContent.querySelector('p').textContent  = texts[mode].p;
        panelContent.style.opacity   = '1';
        panelContent.style.transform = 'translateY(0)';
    }, 300);

    // Flip the forms
    if (mode === 'register') {
        formsSide.classList.add('show-register');
    } else {
        formsSide.classList.remove('show-register');
    }
}

// If validation errors came from register, show register side
@if($errors->has('name') || $errors->has('phone_number') || $errors->has('city'))
    switchTo('register');
@endif
</script>

</body>
</html>