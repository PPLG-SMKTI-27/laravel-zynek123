<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Portfolio | {{ $nama }}</title>

<style>
:root {
    --bg: #f5f7fa;
    --text: #333;
    --card: #ffffff;
    --primary: #0f172a;
}

.dark {
    --bg: #0f172a;
    --text: #e5e7eb;
    --card: #1e293b;
    --primary: #38bdf8;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
    transition: background 0.4s ease, color 0.4s ease;
}

body {
    background: var(--bg);
    color: var(--text);
}

header {
    padding: 80px 20px;
    text-align: center;
    background: linear-gradient(135deg, var(--primary), #1e293b);
    color: white;
}

header h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.toggle {
    position: fixed;
    top: 20px;
    right: 20px;
    background: var(--card);
    border-radius: 30px;
    padding: 10px 16px;
    cursor: pointer;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    font-size: 14px;
}

section {
    max-width: 900px;
    margin: auto;
    padding: 60px 20px;
}

h2 {
    margin-bottom: 20px;
    color: var(--primary);
}

.about {
    background: var(--card);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    line-height: 1.8;
}

.github {
    text-align: center;
    margin-top: 40px;
}

.github a {
    display: inline-block;
    padding: 14px 30px;
    background: var(--primary);
    color: white;
    border-radius: 30px;
    text-decoration: none;
    transition: 0.3s;
    font-weight: 500;
}

.github a:hover {
    opacity: 0.85;
}

footer {
    text-align: center;
    padding: 25px;
    background: var(--card);
    margin-top: 60px;
    font-size: 14px;
}

.gallery {
    margin-top: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.gallery img {
    width: 70%;
    height: 500px;
    object-fit: cover;
    border-radius: 400px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    transition: transform 0.4s ease;
}

.gallery img:hover {
    transform: scale(1.05);
}

.btn-project {
    margin-left: 15px;
    background: transparent;
    color: var(--primary);
    border: 2px solid var(--primary);
}

.btn-project:hover {
    background: var(--primary);
    color: white;
}
</style>
</head>

<body>

<div class="toggle" onclick="toggleDark()">
    🌙 Dark Mode
</div>

<header>
    <h1>{{ $nama }}</h1>
    <p>{{ $profesi }}</p>
</header>

<section>
    <h2>Tentang Saya</h2>
    <div class="about">
        {!! nl2br(e($deskripsi)) !!}
    </div>

    <div class="github">
        <a href="{{ $github }}" target="_blank">🔗 GitHub Saya</a>
        <a href="{{ url('/project') }}" class="btn-project">📁 Project Saya</a>
    </div>
</section>

<div class="gallery">
    <img src="{{ asset('img/p.jpeg') }}" alt="Foto 1">
    <img src="{{ asset('img/o.jpeg') }}" alt="Foto 2">
</div>

<footer>
    © {{ now()->year }} {{ $nama }} • Portfolio
</footer>

<script>
function toggleDark() {
    document.body.classList.toggle("dark");
}
</script>

</body>
</html>
