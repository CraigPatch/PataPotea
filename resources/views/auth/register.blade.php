<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register — Pata Potea Tanzania</title>
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
            max-width: 900px;
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
            width: 40px; height: 40px; background: rgba(255,255,255,0.15);
            border-radius: 10px; display: flex; align-items: center; justify-content: center;
        }
        .auth-logo-icon svg { width: 22px; height: 22px; fill: white; }
        .auth-brand { font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 700; color: white; }
        .auth-brand span { color: #fac775; }
        .auth-panel h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem; font-weight: 900;
            color: white; line-height: 1.2; margin-bottom: 1rem;
        }
        .auth-panel p { color: rgba(255,255,255,0.75); font-size: 15px; line-height: 1.7; }
        .auth-stats { display: flex; flex-direction: column; gap: 16px; margin-top: 2.5rem; }
        .auth-stat {
            display: flex; align-items: center; gap: 12px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px; padding: 14px 16px;
        }
        .auth-stat-icon {
            width: 36px; height: 36px; background: rgba(255,255,255,0.15);
            border-radius: 8px; display: flex; align-items: center; justify-content: center;
            font-size: 18px; flex-shrink: 0;
        }
        .auth-stat-text { color: rgba(255,255,255,0.85); font-size: 13px; line-height: 1.4; }
        .auth-stat-text strong { color: white; font-weight: 600; display: block; font-size: 14px; }

        /* Right panel — form */
        .auth-form-panel { padding: 3rem 2.5rem; overflow-y: auto; }
        .auth-form-panel h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem; font-weight: 700;
            color: #0f2218; margin-bottom: 6px;
        }
        .auth-form-panel .subtitle { font-size: 14px; color: #5a7a68; margin-bottom: 2rem; }
        .auth-form-panel .subtitle a { color: #2e8b52; font-weight: 600; text-decoration: none; }
        .auth-form-panel .subtitle a:hover { text-decoration: underline; }

        .form-group { margin-bottom: 1.1rem; }
        .form-group label {
            display: block; font-size: 13px; font-weight: 600;
            color: #2d5040; margin-bottom: 6px;
        }
        .form-group input,
        .form-group select {
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
        .form-group input:focus,
        .form-group select:focus {
            border-color: #2e8b52;
            box-shadow: 0 0 0 3px rgba(46,139,82,0.12);
            background: white;
        }
        .form-group .error {
            font-size: 12px; color: #c0392b; margin-top: 4px;
        }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

        .btn-register {
            width: 100%; background: #2e8b52; color: white;
            border: none; border-radius: 10px;
            padding: 13px; font-family: 'DM Sans', sans-serif;
            font-size: 15px; font-weight: 600; cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            margin-top: 0.5rem;
        }
        .btn-register:hover { background: #1d6b3c; transform: translateY(-1px); }

        @media (max-width: 680px) {
            .auth-wrapper { grid-template-columns: 1fr; }
            .auth-panel { display: none; }
            .form-row { grid-template-columns: 1fr; }
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
            <h2>Join Tanzania's Lost & Found Community</h2>
            <p>Help reunite people with their belongings. Create your free account and be part of the solution.</p>
        </div>
        <div class="auth-stats">
            <div class="auth-stat">
                <div class="auth-stat-icon">📦</div>
                <div class="auth-stat-text">
                    <strong>1,240+ Items Reported</strong>
                    Across all major Tanzanian cities
                </div>
            </div>
            <div class="auth-stat">
                <div class="auth-stat-icon">🤝</div>
                <div class="auth-stat-text">
                    <strong>870+ Items Reunited</strong>
                    Thanks to our community
                </div>
            </div>
            <div class="auth-stat">
                <div class="auth-stat-icon">🛡️</div>
                <div class="auth-stat-text">
                    <strong>Safe & Secure</strong>
                    Your privacy is protected
                </div>
            </div>
        </div>
    </div>

    <!-- Right panel -->
    <div class="auth-form-panel">
        <h3>Create your account</h3>
        <p class="subtitle">Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                       placeholder="e.g. Amina Juma" required autofocus/>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       placeholder="amina@gmail.com" required/>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                       placeholder="+255 712 345 678" required/>
                @error('phone_number') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="city">City</label>
                    <select id="city" name="city" required>
                        <option value="" disabled selected>Select city</option>
                        <option value="Dar es Salaam" {{ old('city') == 'Dar es Salaam' ? 'selected' : '' }}>Dar es Salaam</option>
                        <option value="Arusha"        {{ old('city') == 'Arusha'        ? 'selected' : '' }}>Arusha</option>
                        <option value="Mwanza"        {{ old('city') == 'Mwanza'        ? 'selected' : '' }}>Mwanza</option>
                        <option value="Dodoma"        {{ old('city') == 'Dodoma'        ? 'selected' : '' }}>Dodoma</option>
                        <option value="Tanga"         {{ old('city') == 'Tanga'         ? 'selected' : '' }}>Tanga</option>
                        <option value="Morogoro"      {{ old('city') == 'Morogoro'      ? 'selected' : '' }}>Morogoro</option>
                        <option value="Zanzibar"      {{ old('city') == 'Zanzibar'      ? 'selected' : '' }}>Zanzibar</option>
                        <option value="Mbeya"         {{ old('city') == 'Mbeya'         ? 'selected' : '' }}>Mbeya</option>
                        <option value="Tabora"        {{ old('city') == 'Tabora'        ? 'selected' : '' }}>Tabora</option>
                        <option value="Kigoma"        {{ old('city') == 'Kigoma'        ? 'selected' : '' }}>Kigoma</option>
                        <option value="Moshi"         {{ old('city') == 'Moshi'         ? 'selected' : '' }}>Moshi</option>
                        <option value="Iringa"        {{ old('city') == 'Iringa'        ? 'selected' : '' }}>Iringa</option>
                    </select>
                    @error('city') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                           placeholder="Min. 8 characters" required/>
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       placeholder="Repeat your password" required/>
            </div>

            <button type="submit" class="btn-register">Create Account →</button>
        </form>
    </div>
</div>
</body>
</html>