<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Luckiest+Guy&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg: #4da528;
            --bg-darker: #3a7d1f;
            --text: #ffffff;
            --card: #8d6e63;
            --primary: #ffd800;
            --accent: #ff5722;
            --border-wood: #5d4037;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            background-color: var(--bg);
            background-image: linear-gradient(45deg, var(--bg-darker) 25%, transparent 25%, transparent 75%, var(--bg-darker) 75%, var(--bg-darker)), 
                              linear-gradient(45deg, var(--bg-darker) 25%, transparent 25%, transparent 75%, var(--bg-darker) 75%, var(--bg-darker));
            background-size: 80px 80px;
            background-position: 0 0, 40px 40px;
            color: var(--text);
            font-family: 'Montserrat', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: var(--card);
            border: 10px solid var(--border-wood);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5), 15px 15px 0 rgba(0,0,0,0.3);
            max-width: 450px;
            width: 100%;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header h1 {
            font-family: 'Luckiest Guy', cursive;
            font-size: 2.5rem;
            color: var(--primary);
            text-shadow: 3px 3px 0 #000, -1px -1px 0 #000;
            margin-bottom: 10px;
            letter-spacing: 2px;
        }

        .login-header p {
            font-size: 0.95rem;
            color: rgba(255,255,255,0.85);
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: bold;
            border-left: 5px solid;
        }

        .alert-success {
            background: #c8e6c9;
            border-left-color: #2e7d32;
            color: #1b5e20;
        }

        .alert-error {
            background: #ffcdd2;
            border-left-color: #c62828;
            color: #b71c1c;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: var(--text);
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 4px solid var(--border-wood);
            background: #f1f8e9;
            color: #333;
            font-size: 1rem;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            transition: 0.3s;
        }

        .form-group input:focus {
            outline: none;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255,216,0,0.5);
            border-color: var(--primary);
        }

        .error-message {
            color: #c62828;
            font-size: 0.85rem;
            margin-top: 5px;
            font-weight: bold;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            cursor: pointer;
            border: 3px solid var(--border-wood);
        }

        .remember-me label {
            margin: 0;
            font-size: 0.95rem;
            cursor: pointer;
            color: var(--text);
            text-transform: none;
            letter-spacing: normal;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: #4caf50;
            border: 4px solid #2e7d32;
            box-shadow: 0 8px 0 #1b5e20;
            color: white;
            font-family: 'Bangers', cursive;
            font-size: 1.3rem;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.1s;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
        }

        .btn-login:hover {
            background: #66bb6a;
            box-shadow: 0 10px 0 #1b5e20;
            transform: translateY(-2px);
        }

        .btn-login:active {
            transform: translateY(4px);
            box-shadow: 0 2px 0 #1b5e20;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: bold;
            font-size: 0.95rem;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .credentials-hint {
            background: rgba(255,255,255,0.1);
            border: 2px dashed var(--primary);
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .credentials-hint strong {
            color: var(--primary);
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            html, body {
                padding: 10px;
            }

            .login-container {
                padding: 25px;
                border: 6px solid var(--border-wood);
                max-width: 100%;
            }

            .login-header {
                margin-bottom: 25px;
            }

            .login-header h1 {
                font-size: 1.8rem;
                margin-bottom: 8px;
            }

            .login-header p {
                font-size: 0.85rem;
            }

            .form-group {
                margin-bottom: 18px;
            }

            .form-group label {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }

            .form-group input {
                padding: 10px 12px;
                font-size: 0.95rem;
            }

            .remember-me {
                margin-bottom: 15px;
            }

            .remember-me input[type="checkbox"] {
                width: 18px;
                height: 18px;
                margin-right: 8px;
            }

            .remember-me label {
                font-size: 0.9rem;
            }

            .btn-login {
                padding: 12px;
                font-size: 1.1rem;
                box-shadow: 0 5px 0 #1b5e20;
            }

            .btn-login:hover {
                box-shadow: 0 7px 0 #1b5e20;
                transform: translateY(-1px);
            }

            .credentials-hint {
                margin-top: 15px;
                padding: 12px;
                font-size: 0.85rem;
            }

            .back-link {
                margin-top: 15px;
            }

            .back-link a {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            html, body {
                padding: 5px;
                background-size: 60px 60px;
            }

            .login-container {
                padding: 18px;
                border: 4px solid var(--border-wood);
                border-radius: 6px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.4), 10px 10px 0 rgba(0,0,0,0.2);
            }

            .login-header {
                margin-bottom: 20px;
            }

            .login-header h1 {
                font-size: 1.5rem;
                text-shadow: 2px 2px 0 #000, -1px -1px 0 #000;
                margin-bottom: 5px;
                letter-spacing: 1px;
            }

            .login-header p {
                font-size: 0.8rem;
            }

            .alert {
                padding: 12px;
                margin-bottom: 15px;
                font-size: 0.9rem;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                font-size: 0.85rem;
                margin-bottom: 5px;
            }

            .form-group input {
                padding: 8px 10px;
                font-size: 0.9rem;
                border: 3px solid var(--border-wood);
            }

            .error-message {
                font-size: 0.8rem;
                margin-top: 4px;
            }

            .remember-me {
                margin-bottom: 12px;
            }

            .remember-me input[type="checkbox"] {
                width: 16px;
                height: 16px;
                margin-right: 6px;
            }

            .remember-me label {
                font-size: 0.85rem;
            }

            .btn-login {
                padding: 10px;
                font-size: 1rem;
                box-shadow: 0 4px 0 #1b5e20;
                border: 3px solid #2e7d32;
            }

            .btn-login:hover {
                box-shadow: 0 5px 0 #1b5e20;
                transform: translateY(-1px);
            }

            .btn-login:active {
                transform: translateY(3px);
                box-shadow: 0 1px 0 #1b5e20;
            }

            .credentials-hint {
                margin-top: 12px;
                padding: 10px;
                font-size: 0.8rem;
                line-height: 1.5;
                border: 2px dashed var(--primary);
            }

            .back-link {
                margin-top: 12px;
            }

            .back-link a {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>🧟 LOGIN ADMIN</h1>
            <p>Kelola Project & Portfolio</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">
                ❌ {{ $errors->first() }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                ❌ {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">📧 Email</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="Masukkan email"
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">🔐 Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    placeholder="Masukkan password"
                >
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-me">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    name="remember"
                >
                <label for="remember_me">Ingat saya</label>
            </div>

            <button type="submit" class="btn-login">
                ✅ LOGIN
            </button>
        </form>

        <div class="credentials-hint">
            <strong>🔑 Demo Credentials:</strong><br>
            📧 Email: admin@sekolah.id<br>
            🔐 Password: 123456
        </div>

        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Home</a>
        </div>
    </div>
</body>
</html>
