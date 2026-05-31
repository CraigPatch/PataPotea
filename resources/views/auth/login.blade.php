<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login — Pata Potea Tanzania</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: #f0faf3;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        .auth-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 860px;
            width: 100%;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(20,80,48,0.12);
        }

        /* Left panel */
        .auth-panel {
            background: #1d6b3c;
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .auth-logo { display: flex; align-items: center; gap: 10px; margin-bottom: 2rem; }
        .auth-logo-icon {
            width: 40px; height: 40px;
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .auth-logo-icon svg { width: 22px; height: 22px; fill: white; }
        .auth-brand { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 700; color: white; }
        .auth-brand span { color: #fac775; }
        .auth-panel h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem; font-weight: 900;
            color: white; line-height: 1.2; margin-bottom: 1rem;
        }
        .auth-panel p { color: rgba(255,255,255,0.75); font-size: 15px; line-height: 1.7; }
        .welcome-back {
            margin-top: 2.5rem;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 16px;
            padding: 1.5rem;
        }
        .welcome-back p {
            color: rgba(255,255,255,0.7);
            font-size: 13px;
            line-height: 1.65;
            margin-top: 8px;
        }
        .welcome-back strong { color: white; font-size: 15px; display: block; margin-bottom: 4px; }
        .steps { display: flex; flex-direction: column; gap: 12px; margin-top: 1.5rem; }
        .step-item { display: flex; align-items: center; gap: 10px; }
        .step-dot {
            width: 28px; height: 28px; border-radius: 50%;
            background: rgba(255,255,255,0.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; flex-shrink: 0;
        }
        .step-item span { color: rgba(255,255,255,0.8); font-size: 13px; }

        /* Right panel */
        .auth-form-panel { padding: 3rem 2.5rem; }
        .auth-form-panel h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem; font-weight: 700;
            color: #0f2218; margin-bottom: 6px;
        }
        .auth-form-panel .subtitle { font-size: 14px; color: #5a7a68; margin-bottom: 2rem; }
        .auth-form-panel .subtitle a { color: #2e8b52; font-weight: 600; text-decoration: none; }
        .auth-form-panel .subtitle a:hover { text-decoration: underline; }

        /* Session status */
        .session-status {
            background: #d6f3df; border: 1px solid #aee8c0;
            color: #1d6b3c; border-radius: 10px;
            padding: 10px 14px; font-size: 13px;
            margin-bottom: 1.2rem;
        }

        .form-group { margin-bottom: 1.2rem; }
        .form-group label {
            display: block; font-size: 13px; font-weight: 600;
            color: #2d5040; margin-bottom: 6px;
        }
        .form-group input {
            width: 100%;
            border: 1.5px solid #aee8c0;
            border-radius: 10px;
            padding: 11px 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: #0f2218;
            background: #f0faf3;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-group input:focus {
            border-color: #2e8b52;
            box-shadow: 0 0 0 3px rgba(46,139,82,0.12);
            background: white;
        }
        .form-group .error { font-size: 12px; color: #c0392b; margin-top: 4px; }

        .form-footer {
            display: flex; align-items: center;
            justify-content: space-between;
            margin-bottom: 1.4rem;
        }
        .remember-me { display: flex; align-items: center; gap: 8px; cursor: pointer; }
        .remember-me input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: #2e8b52;
            cursor: pointer;
        }
        .remember-me span { font-size: 13px; color: #5a7a68; }
        .forgot-link { font-size: 13px; color: #2e8b52; font-weight: 600; text-decoration: none; }
        .forgot-link:hover { text-decoration: underline; }

        .btn-login {
            width: 100%; background: #2e8b52; color: white;
            border: none; border-radius: 10px;
            padding: 13px; font-family: 'DM Sans', sans-serif;
            font-size: 15px; font-weight: 600; cursor: pointer;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-login:hover { background: #1d6b3c; transform: translateY(-1px); }

        .divider {
            display: flex; align-items: center; gap: 12px;
            margin: 1.5rem 0; color: #5a7a68; font-size: 12px;
        }
        .divider::before, .divider::after {
            content: ''; flex: 1; height: 1px; background: #aee8c0;
        }

        .btn-register-link {
            display: block; text-align: center;
            border: 1.5px solid #aee8c0; border-radius: 10px;
            padding: 12px; font-size: 14px; font-weight: 600;
            color: #2e8b52; text-decoration: none;
            transition: all 0.2s;
        }
        .btn-register-link:hover {
            background: #f0faf3; border-color: #2e8b52;
        }

        @media (max-width: 620px) {
            .auth-wrapper { grid-template-columns: 1fr; }
            .auth-panel { display: none; }
        }
    </style>
</head>
<body>
<div class="auth-wrapper">

    <!-- Left panel -->
    <div class="auth-panel">
        <div>
            <div class="auth-logo">
                <div class="auth-logo-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/></svg>
                </div>
                <span class="auth-brand">Pata <span>Potea</span></span>
            </div>
            <h2>Welcome back to Pata Potea</h2>
            <p>Sign in to manage your listings, track claims, and connect with your community.</p>
        </div>

        <div class="welcome-back">
            <strong>🇹🇿 Built for Tanzania</strong>
            <p>Serving lost & found communities across Dar es Salaam, Arusha, Mwanza, Dodoma and beyond.</p>
            <div class="steps">
                <div class="step-item">
                    <div class="step-dot">📋</div>
                    <span>Post lost or found items instantly</span>
                </div>
                <div class="step-item">
                    <div class="step-dot">🔍</div>
                    <span>Search and filter by city or category</span>
                </div>
                <div class="step-item">
                    <div class="step-dot">💬</div>
                    <span>Message owners and finders safely</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right panel -->
    <div class="auth-form-panel">
        <h3>Sign in to your account</h3>
        <p class="subtitle">
            Don't have an account?
            <a href="{{ route('register') }}">Create one free</a>
        </p>

        {{-- Session status --}}
        @if (session('status'))
            <div class="session-status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}"
                       placeholder="amina@gmail.com"
                       required autofocus autocomplete="username"/>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                       placeholder="Your password"
                       required autocomplete="current-password"/>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-footer">
                <label class="remember-me">
                    <input type="checkbox" name="remember"/>
                    <span>Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        Forgot password?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-login">Sign In →</button>

            <div class="divider">or</div>

            <a href="{{ route('register') }}" class="btn-register-link">
                Create a new account
            </a>
        </form>
    </div>

</div>
</body>
</html>