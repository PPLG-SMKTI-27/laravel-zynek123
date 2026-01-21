<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Portfolio | {{ $nama }}</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Portfolio')

@section('content')

<header class="fade-in">
    <h1>{{ $nama }}</h1>
    <p>{{ $profesi }}</p>
</header>

<section class="fade-in">
    <h2>Tentang Saya</h2>

    <div class="about">
        {!! nl2br(e($deskripsi)) !!}
    </div>

    <div class="github">
        <a href="{{ $github }}" target="_blank">🔗 GitHub Saya</a>
        <a href="{{ route('project') }}">📁 Project Saya</a>
    </div>
</section>

<section class="fade-in">
    <div class="project-grid">
        <div class="project-card">
            <h3>The Outlaw Code</h3>
            <p>Sistem manajemen inventaris senjata dan kuda berbasis web.</p>
            <div style="text-align: center;">
                <span class="tag">Laravel</span>
                <span class="tag">Bootstrap</span>
            </div>
        </div>
    </div>


</section>

<div class="gallery fade-in">
    <img src="{{ asset('img/p.jpeg') }}" alt="Foto Profil">
    <img src="{{ asset('img/o.jpeg') }}" alt="Foto Profil">
</div>
@endsection

</body>
</html>
