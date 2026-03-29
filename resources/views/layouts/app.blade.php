<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Luckiest+Guy&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- PvZ Theme Styles -->
        <style>
            /* VARIABEL WARNA PVZ */
            :root {
                --bg: #4da528;
                --bg-darker: #3a7d1f;
                --text: #ffffff;
                --card: #8d6e63;
                --primary: #ffd800;
                --accent: #ff5722;
                --border-wood: #5d4037;
                --zombie-skin: #7cb342;
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
            }

            /* HEADER STYLE */
            header {
                display: none;
            }

            header h1 {
                font-family: 'Luckiest Guy', cursive;
                font-size: clamp(2rem, 8vw, 4rem);
                letter-spacing: 2px;
                color: var(--primary);
                text-shadow: 4px 4px 0 #000, -2px -2px 0 #000, 2px -2px 0 #000, -2px 2px 0 #000, 2px 2px 0 #000;
                text-transform: uppercase;
                margin: 0;
            }

            header p {
                color: rgba(255,255,255,0.9);
                font-size: 1.1rem;
                margin-top: 10px;
            }

            /* PROJECT GRID & CARD */
            .project-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 30px;
                padding: 20px 0;
            }

            .project-card {
                background: #f1f8e9;
                color: #333;
                border: 6px solid var(--border-wood);
                padding: 25px;
                border-radius: 0;
                box-shadow: 10px 10px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                position: relative;
                overflow: hidden;
            }

            .project-card:hover {
                transform: scale(1.05) rotate(-2deg);
                z-index: 10;
            }

            .project-card h3 {
                font-family: 'Bangers', cursive;
                font-size: 1.8rem;
                margin-bottom: 12px;
                color: #2e7d32;
            }

            .project-card p {
                line-height: 1.5;
                font-size: 0.95rem;
                margin-bottom: 20px;
            }

            /* TAGS */
            .tag {
                display: inline-block;
                background: var(--zombie-skin);
                color: white;
                padding: 5px 12px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: bold;
                margin-right: 5px;
                text-transform: uppercase;
            }

            /* BUTTONS */
            .btn-back {
                display: inline-block;
                padding: 15px 35px;
                background: #ff9800;
                color: white;
                border-radius: 10px;
                text-decoration: none;
                font-family: 'Bangers', cursive;
                font-size: 1.4rem;
                border: 4px solid #e65100;
                box-shadow: 0 6px 0 #bf360c;
                transition: 0.1s;
                cursor: pointer;
            }

            .btn-back:hover {
                background: #ffa726;
                transform: translateY(-2px);
            }

            .btn-back:active {
                transform: translateY(4px);
                box-shadow: 0 2px 0 #bf360c;
            }

            /* SECTION */
            section {
                max-width: 1100px;
                margin: auto;
                padding: 20px;
            }

            .center {
                text-align: center;
                margin-top: 40px;
                margin-bottom: 60px;
            }

            .fade-in {
                animation: fadeIn 0.5s ease-in;
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
        </style>
    </head>
    <body>
        @include('layouts.navigation')

        <!-- Page Content -->
        @if(View::hasSection('content'))
            @yield('content')
        @else
            <main>
                {{ $slot ?? '' }}
            </main>
        @endif
    </body>
</html>
