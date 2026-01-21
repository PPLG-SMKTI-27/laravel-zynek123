<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Project | {{ $nama }}</title>
@extends('layouts.app')

@section('title', 'Project')

@section('content')

<header class="fade-in">
    <h1>Project Saya</h1>
    <p>Kumpulan latihan & project pembelajaran</p>
</header>

<section class="project-grid fade-in">

    <div class="project-card">
        <h3>Website Portfolio</h3>
        <p>
            Website portfolio pribadi menggunakan PHP, Laravel, dan CSS modern.
        </p>
        <span class="tag">Laravel</span>
        <span class="tag">CSS</span>
    </div>

    <div class="project-card">
        <h3>Landing Page</h3>
        <p>
            Landing page sederhana, responsif, dan user-friendly.
        </p>
        <span class="tag">HTML</span>
        <span class="tag">CSS</span>
    </div>

</section>

<div class="center fade-in">
    <a href="{{ url('/') }}" class="btn-back">⬅ Kembali ke Portfolio</a>
</div>

@endsection


</body>
</html>
