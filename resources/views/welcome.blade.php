@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')

<style>
.btn-login {
    display: inline-block;
    margin: 15px 0;
    padding: 14px 30px;
    background: var(--accent);
    color: white;
    border-radius: 30px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}
.btn-login:hover {
    opacity: 0.85;
    transform: scale(1.05);
}

/* MODAL */
.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    z-index: 9999;
    justify-content: center;
    align-items: center;
}
.modal-content {
    background: var(--card);
    padding: 30px;
    width: 350px;
    border-radius: 15px;
    position: relative;
}
.modal-content input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
}
.btn-login-modal {
    width: 100%;
    padding: 14px;
    background: var(--primary);
    border: none;
    color: white;
    font-weight: bold;
    cursor: pointer;
}
.close {
    position: absolute;
    top: 10px;
    right: 15px;
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
}

.github a,
.btn-project {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 260px;      /* ukuran sama */
    height: 70px;
    font-size: 1.4rem;
}
</style>


<section class="fade-in">
   
    <div class="about">
     
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
      
        </a>
</div>

    <div class="github fade-in">

        @if (!empty($github) && filter_var($github, FILTER_VALIDATE_URL))
            <a href="{{ $github }}" target="_blank" rel="noopener noreferrer">🔗 GitHub Saya</a>
        @else
            <a href="https://github.com/zynek123" target="_blank" rel="noopener noreferrer" style="opacity: 0.5.5;" >Github Saya</a>
        @endif

        {{-- JIKA BELUM LOGIN --}}
        @if (!session('login'))
            <a href="javascript:void(0)" onclick="openModal()" class="btn-login">
                🔐 Login
            </a>
        @endif

        {{-- PROJECT (AKAN DICEK DI CONTROLLER) --}}
        <a href="{{ route('project') }}" class="btn-project">
            📁 Project Saya
        </a>

        {{-- INFO LOGIN --}}
        @if (session('login'))
            <p style="margin-top:10px">
                Login sebagai: <b>{{ session('email') }}</b>
            </p>

            {{-- LOGOUT --}}
            <form action="{{ route('logout') }}" method="POST" style="margin-top:10px">
                @csrf
                <button type="submit" class="btn-back"
                        onclick="return confirm('Yakin mau logout?')">
                    🚪 Logout
                </button>
            </form>
        @endif

    </div>
</section>

{{-- CONTOH PROJECT --}}
<section class="fade-in">
    <div class="project-grid">
        <div class="project-card">
            <h3>Short Profile</h3>
            <p> Saya Rasya Aulia Rahman Firly siswa dari jurusan PPLG yang memiliki minat di bidang pemograman dasar dan penegembangan web. Terbiasa bekerja dalam tim, disiplin, dan memiliki pengalaman kerja serta organisasi yang membentuk tanggung jawab dan kepemimpinan. Aktif dalam kegiatan olahraga beladiri dan kegiatan sosial.</p>
            <div style="text-align:center">
                <span class="tag">Instagram : rsy44___</span>
                <span class="tag">WhatsApp : 0895-0393-6624</span>
            </div>
        </div>
    </div>
</section>

{{-- MODAL LOGIN --}}
<div id="loginModal" class="modal">
    <div class="modal-content fade-in">
        <h3 style="text-align:center;margin-bottom:20px">LOGIN PORTOFOLIO</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input type="email" name="email" placeholder="Email"
                   value="{{ old('email') }}" required>

            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" class="btn-login-modal">
                🌻 LOGIN
            </button>
        </form>

        @if(session('error'))
            <p style="color:red;text-align:center;margin-top:15px">
                {{ session('error') }}
            </p>
        @endif

        @if(session('success'))
            <p style="color:lime;text-align:center;margin-top:15px">
                {{ session('success') }}
            </p>
        @endif

        <div class="center" style="margin-top:15px">
            <button onclick="closeModal()" class="btn-back">⬅ Kembali</button>
        </div>

        <button class="close" onclick="closeModal()">✖</button>
    </div>
</div>

<div class="gallery fade-in">
    @if(!empty($foto1))
        <img src="{{ asset('img/' . $foto1) }}" alt="Foto 1">
    @endif

    @if(!empty($foto2))
        <img src="{{ asset('img/' . $foto2) }}" alt="Foto 2">
    @endif
</div>




<script>
function openModal() {
    document.getElementById('loginModal').style.display = 'flex';
}
function closeModal() {
    document.getElementById('loginModal').style.display = 'none';
}

// BUKA MODAL OTOMATIS JIKA LOGIN GAGAL / BERHASIL
@if(session('error') || session('success'))
    document.addEventListener('DOMContentLoaded', () => openModal());
@endif
</script>

@endsection
