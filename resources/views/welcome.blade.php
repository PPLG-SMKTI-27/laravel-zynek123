@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')

<style>
/* LAYOUT HERO */
.hero {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: center;
    padding: 60px 20px;
    max-width: 1100px;
    margin: auto;
}

@media (max-width: 768px) {
    .hero {
        grid-template-columns: 1fr;
        padding: 40px 20px;
    }
}

.hero-text h1 {
    font-family: 'Luckiest Guy', cursive;
    font-size: clamp(2rem, 6vw, 3.5rem);
    color: var(--primary);
    text-shadow: 4px 4px 0 #000;
    margin-bottom: 20px;
}

.hero-text p {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 30px;
    color: rgba(255,255,255,0.95);
}

.hero-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.auth-buttons {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    width: 100%;
}

.auth-buttons .btn-hero {
    flex: 1 1 calc(50% - 6px);
    width: auto !important;
    min-width: 120px;
}

.auth-buttons button,
.auth-buttons a {
    flex: 1;
    min-width: 120px;
}

.btn-hero {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 300px;
    padding: 16px 24px;
    background: var(--primary);
    color: #000;
    border: 4px solid var(--border-wood);
    border-radius: 8px;
    text-decoration: none;
    font-family: 'Bangers', cursive;
    font-size: 1.3rem;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 6px 0 #5d4037;
    transition: 0.1s;
}

.btn-hero:hover {
    background: #ffeb3b;
    transform: translateY(-2px);
    box-shadow: 0 8px 0 #5d4037;
}

.btn-hero:active {
    transform: translateY(4px);
    box-shadow: 0 2px 0 #5d4037;
}

.btn-hero.secondary {
    background: var(--accent);
    color: white;
}

.btn-hero.secondary:hover {
    background: #ff7043;
}

.hero-photo {
    text-align: center;
}

.hero-photo img {
    max-width: 100%;
    height: auto;
    border: 6px solid var(--border-wood);
    border-radius: 10px;
    box-shadow: 15px 15px 0 rgba(0,0,0,0.3);
    transition: transform 0.3s;
}

.hero-photo img:hover {
    transform: scale(1.03) rotate(-2deg);
}

/* PROFILE CARD */
.profile-card {
    background: #f1f8e9;
    color: #333;
    border: 6px solid var(--border-wood);
    padding: 40px;
    border-radius: 8px;
    max-width: 1100px;
    margin: 60px auto;
    box-shadow: 10px 10px 0 rgba(0,0,0,0.2);
}

.profile-card h2 {
    font-family: 'Bangers', cursive;
    font-size: 2.2rem;
    color: #2e7d32;
    margin-bottom: 20px;
}

.profile-card p {
    font-size: 1rem;
    line-height: 1.7;
    margin-bottom: 25px;
}

.profile-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

/* LOGIN SECTION */
.login-info {
    text-align: center;
    margin: 30px 0;
    padding: 20px;
    background: rgba(255,255,255,0.1);
    border-radius: 8px;
}

.login-info p {
    margin: 0;
    color: rgba(255,255,255,0.9);
}

.login-info b {
    color: var(--primary);
    font-weight: bold;
}

/* MODAL */
.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.7);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.modal-content {
    background: var(--card);
    padding: 40px 30px;
    width: 100%;
    max-width: 400px;
    border: 6px solid var(--border-wood);
    border-radius: 12px;
    box-shadow: 20px 20px 0 rgba(0,0,0,0.4);
}

.modal-content h3 {
    text-align: center;
    color: var(--primary);
    font-family: 'Luckiest Guy', cursive;
    font-size: 1.8rem;
    margin-bottom: 25px;
}

.modal-content input {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 15px;
    border: 3px solid var(--border-wood);
    border-radius: 6px;
    font-size: 1rem;
    background: rgba(255,255,255,0.9);
}

.modal-content input:focus {
    outline: none;
    background: white;
    border-color: var(--primary);
}

.btn-login-modal {
    width: 100%;
    padding: 14px;
    background: var(--primary);
    color: #000;
    border: 4px solid var(--border-wood);
    border-radius: 8px;
    font-family: 'Bangers', cursive;
    font-size: 1.2rem;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 6px 0 #5d4037;
    transition: 0.1s;
}

.btn-login-modal:hover {
    background: #ffeb3b;
    transform: translateY(-2px);
}

.btn-login-modal:active {
    transform: translateY(4px);
    box-shadow: 0 2px 0 #5d4037;
}

.close {
    position: absolute;
    top: 15px;
    right: 15px;
    background: none;
    border: none;
    font-size: 28px;
    cursor: pointer;
    color: var(--primary);
    font-weight: bold;
}

.close:hover {
    transform: scale(1.2);
}

.modal-error {
    color: #ff5252;
    text-align: center;
    margin-top: 15px;
    font-weight: bold;
}

.modal-success {
    color: #76ff03;
    text-align: center;
    margin-top: 15px;
    font-weight: bold;
}
</style>

<!-- HERO SECTION -->
<section class="hero fade-in">
    <div class="hero-text">
        <h1>🎮 Rasya Aulia Rahman Firly</h1>
        <p>Siswa PPLG yang passionate tentang web development, design thinking, dan problem solving. Aktif dalam organisasi dan kegiatan sosial.</p>
        
        <div class="hero-buttons">
            @if (!empty($github) && filter_var($github, FILTER_VALIDATE_URL))
                <a href="{{ $github }}" target="_blank" rel="noopener noreferrer" class="btn-hero secondary">
                    🔗 GitHub Saya
                </a>
            @else
                <a href="https://github.com/zynek123" target="_blank" rel="noopener noreferrer" class="btn-hero secondary" style="opacity: 0.8;">
                    🔗 GitHub Saya
                </a>
            @endif

            <a href="{{ route('project') }}" class="btn-hero">
                📁 Project Saya
            </a>
        </div>

        @if (session('login'))
            <div class="login-info">
                <p>Login sebagai: <b>{{ session('email') }}</b></p>
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 15px;">
                    @csrf
                    <button type="submit" class="btn-hero secondary" style="width: 100%; max-width: 300px;" onclick="return confirm('Yakin mau logout?')">
                        🚪 Logout
                    </button>
                </form>
            </div>
        @endif
    </div>

    <div class="hero-photo">
        @if(!empty($foto1))
            <img src="{{ asset('img/' . $foto1) }}" alt="Foto Portfolio 1">
        @else
            <div style="background: #ddd; border: 3px dashed var(--border-wood); border-radius: 8px; padding: 60px 40px; text-align: center;">
                <p style="color: #666; font-size: 1.1rem;">Foto belum diupload</p>
            </div>
        @endif
    </div>
</section>

<!-- GALLERY SECTION - Tampilkan kedua foto -->
<section class="fade-in" style="max-width: 1100px; margin: 60px auto; padding: 20px;">
    <h2 style="font-family: 'Luckiest Guy', cursive; font-size: 2rem; text-align: center; color: var(--primary); margin-bottom: 40px; text-shadow: 3px 3px 0 #000;">📸 GALERI FOTO</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        <!-- Foto 1 -->
        <div style="border: 6px solid var(--border-wood); border-radius: 10px; overflow: hidden; box-shadow: 10px 10px 0 rgba(0,0,0,0.2);">
            @if(!empty($foto1))
                <img src="{{ asset('img/' . $foto1) }}" alt="Foto Portfolio 1" style="width: 100%; height: 300px; object-fit: cover;">
            @else
                <div style="background: #ddd; width: 100%; height: 300px; display: flex; align-items: center; justify-content: center;">
                    <p style="color: #666; font-size: 1rem;">Foto 1 belum diupload</p>
                </div>
            @endif
        </div>

        <!-- Foto 2 -->
        <div style="border: 6px solid var(--border-wood); border-radius: 10px; overflow: hidden; box-shadow: 10px 10px 0 rgba(0,0,0,0.2);">
            @if(!empty($foto2))
                <img src="{{ asset('img/' . $foto2) }}" alt="Foto Portfolio 2" style="width: 100%; height: 300px; object-fit: cover;">
            @else
                <div style="background: #ddd; width: 100%; height: 300px; display: flex; align-items: center; justify-content: center;">
                    <p style="color: #666; font-size: 1rem;">Foto 2 belum diupload</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- PROFILE CARD -->
<section class="profile-card fade-in">
    <h2>📸 Short Profile</h2>
    <p>
        Saya Rasya Aulia Rahman Firly siswa dari jurusan PPLG yang memiliki minat di bidang pemograman dasar dan penegembangan web. Terbiasa bekerja dalam tim, disiplin, dan memiliki pengalaman kerja serta organisasi yang membentuk tanggung jawab dan kepemimpinan. Aktif dalam kegiatan olahraga beladiri dan kegiatan sosial.
    </p>
    <div class="profile-tags">
        <span class="tag">📱 Instagram: rsy44___</span>
        <span class="tag">💬 WhatsApp: 0895-0393-6624</span>
    </div>
</section>

<!-- MODAL LOGIN -->
<div id="loginModal" class="modal">
    <div class="modal-content fade-in">
        <h3>🌻 LOGIN PORTOFOLIO</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="📧 Email"
                   value="{{ old('email') }}" required>

            <input type="password" name="password" placeholder="🔐 Password" required>

            <button type="submit" class="btn-login-modal">
                🌻 LOGIN
            </button>
        </form>

        @if(session('error'))
            <div class="modal-error">❌ {{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="modal-success">✅ {{ session('success') }}</div>
        @endif

        <div style="text-align: center; margin-top: 15px;">
            <button onclick="closeModal()" class="btn-hero" style="background: #999; max-width: none; width: auto; padding: 10px 20px;">
                ⬅ Kembali
            </button>
        </div>

        <button class="close" onclick="closeModal()">✖</button>
    </div>
</div>
}

// BUKA MODAL OTOMATIS JIKA LOGIN GAGAL / BERHASIL
@if(session('error') || session('success'))
    document.addEventListener('DOMContentLoaded', () => openModal());
@endif
</script>

@endsection
