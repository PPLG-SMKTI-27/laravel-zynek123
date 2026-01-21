<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')</title>

<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Luckiest+Guy&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

<style>
/* VARIABEL WARNA PVZ */
:root {
    --bg: #4da528;          /* Hijau rumput terang */
    --bg-darker: #3a7d1f;   /* Hijau rumput gelap */
    --text: #ffffff;
    --card: #8d6e63;        /* Kayu cokelat */
    --primary: #ffd800;     /* Kuning Sunflower */
    --accent: #ff5722;      /* Oranye/Merah */
    --border-wood: #5d4037;
    --zombie-skin: #7cb342;
}

/* DARK MODE (ZOMBIE NIGHT THEME) */
.dark {
    --bg: #1a2e10;
    --bg-darker: #0d1708;
    --text: #e0e0e0;
    --card: #37474f;        /* Batu nisan kelabu */
    --primary: #9c27b0;     /* Ungu Zombie */
    --accent: #4caf50;
    --border-wood: #263238;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: var(--bg);
    /* Pola Kotak-Kotak Rumput PvZ */
    background-image: linear-gradient(45deg, var(--bg-darker) 25%, transparent 25%, transparent 75%, var(--bg-darker) 75%, var(--bg-darker)), 
                      linear-gradient(45deg, var(--bg-darker) 25%, transparent 25%, transparent 75%, var(--bg-darker) 75%, var(--bg-darker));
    background-size: 80px 80px;
    background-position: 0 0, 40px 40px;
    color: var(--text);
    font-family: 'Montserrat', sans-serif;
    min-height: 100vh;
    transition: background 0.5s ease;
}

/* TOGGLE BUTTON (SUNFLOWER / ZOMBIE) */
.toggle {
    position: fixed;
    top: 20px;
    right: 20px;
    background: var(--primary);
    color: #000;
    border-radius: 50px;
    padding: 12px 20px;
    cursor: pointer;
    box-shadow: 0 6px 0 rgba(0,0,0,0.3);
    z-index: 9999;
    font-family: 'Luckiest Guy', cursive;
    border: 3px solid var(--border-wood);
    transition: 0.2s;
}

.toggle:active {
    transform: translateY(4px);
    box-shadow: 0 2px 0 rgba(0,0,0,0.3);
}

/* HEADER STYLE (WOODEN SIGN) */
header {
    padding: 60px 20px;
    text-align: center;
    background: var(--card);
    border-bottom: 10px solid var(--border-wood);
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
    margin-bottom: 40px;
}

header h1 {
    font-family: 'Luckiest Guy', cursive;
    font-size: clamp(2rem, 8vw, 4rem);
    letter-spacing: 2px;
    color: var(--primary);
    text-shadow: 4px 4px 0 #000, -2px -2px 0 #000, 2px -2px 0 #000, -2px 2px 0 #000, 2px 2px 0 #000;
    text-transform: uppercase;
}

/* MAIN SECTION */
section {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
}

/* PROJECT GRID & CARD (SEED PACKETS) */
.project-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    padding: 20px 0;
}

.project-card {
    background: #f1f8e9; /* Warna kertas benih */
    color: #333;
    border: 6px solid var(--border-wood);
    padding: 25px;
    border-radius: 0; /* Khas kartu PvZ */
    box-shadow: 10px 10px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    position: relative;
    overflow: hidden;
}

.dark .project-card {
    background: #455a64;
    color: #fff;
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

.dark .project-card h3 { color: var(--accent); }

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

/* GITHUB & BUTTONS */
.github {
    text-align: center;
    margin-top: 50px;
}

.github a, .btn-back {
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
}

.github a:hover, .btn-back:hover {
    background: #ffa726;
    transform: translateY(-2px);
}

.github a:active, .btn-back:active {
    transform: translateY(4px);
    box-shadow: 0 2px 0 #bf360c;
}

.center {
    text-align: center;
    margin-top: 40px;
    margin-bottom: 60px;
}

/* GALLERY */
.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 40px;
}

.gallery img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 6px solid white;
    outline: 6px solid var(--border-wood);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
}

/* FOOTER */
footer {
    text-align: center;
    padding: 40px;
    background: var(--border-wood);
    color: #bdbdbd;
    margin-top: 80px;
    font-family: 'Bangers', cursive;
    font-size: 1.2rem;
    letter-spacing: 1px;
}

/* ANIMASI */
.fade-in {
    opacity: 0;
    animation: fadeInUp 0.8s ease forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
    from {
        opacity: 0;
        transform: translateY(40px);
    }
}

/* RESPONSIVE */
@media (max-width: 600px) {
    header { padding: 40px 10px; }
    .project-grid { grid-template-columns: 1fr; }
    .toggle { top: 10px; right: 10px; padding: 8px 15px; font-size: 0.8rem; }
}
</style>
</head>

<body>

<div class="toggle" onclick="toggleDark()" id="themeBtn">🌻 Day Mode</div>

<header class="fade-in">
    <h1>@yield('header_title', 'PLANTS vs PORTFOLIO')</h1>
</header>

<section>
    {{-- ISI HALAMAN --}}
    @yield('content')
</section>

<footer class="fade-in">
    © {{ now()->year }} Rasya • THE CRAZY DEVELOPER 🧠
</footer>

<script>
const body = document.body;
const btn = document.getElementById('themeBtn');

// Load preference
if (localStorage.getItem('dark') === 'true') {
    body.classList.add('dark');
    btn.innerHTML = "🧟 Night Mode";
}

function toggleDark() {
    body.classList.toggle("dark");
    const isDark = body.classList.contains('dark');
    localStorage.setItem('dark', isDark);
    
    if(isDark) {
        btn.innerHTML = "🧟 Night Mode";
    } else {
        btn.innerHTML = "🌻 Day Mode";
    }
}
</script>

</body>
</html>