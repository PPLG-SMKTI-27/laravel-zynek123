@extends('layouts.app')

@section('title', 'Project')

@section('content')

<header class="fade-in">
    <h1>🎮 Project Saya</h1>
    <p>Kumpulan latihan & project pembelajaran</p>
</header>

<section class="project-grid fade-in">
    @forelse ($projects as $project)
        <div class="project-card">
            @if ($project->image)
                <div style="margin-bottom: 15px; border-radius: 5px; overflow: hidden; height: 180px;">
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: 100%; object-fit: cover; border: 3px solid var(--border-wood);">
                </div>
            @endif

            <h3>{{ $project->title }}</h3>
            <p>{{ $project->description }}</p>
            
            @if ($project->tags)
                <div style="margin: 15px 0;">
                    @foreach ($project->tags as $tag)
                        <span class="tag">{{ $tag }}</span>
                    @endforeach
                </div>
            @endif

            <div style="margin-top: 15px; display: flex; gap: 8px; flex-wrap: wrap;">
                <a href="{{ route('project.show', $project->id) }}" style="flex: 1; display: inline-block; background: #2196F3; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; text-align: center; transition: 0.2s; border: 3px solid var(--border-wood);">
                    👁️ Lihat Detail
                </a>
                @if ($project->link)
                    <a href="{{ $project->link }}" target="_blank" style="flex: 1; display: inline-block; background: var(--primary); color: #000; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; text-align: center; transition: 0.2s; border: 3px solid var(--border-wood);">
                        🔗 Kunjungi
                    </a>
                @endif
            </div>
        </div>
    @empty
        <div style="grid-column: 1 / -1; text-align: center; background: #fff9c4; border: 4px solid #fbc02d; color: #f57f17; padding: 40px; border-radius: 8px;">
            <h3 style="font-family: 'Luckiest Guy', cursive; font-size: 2rem; margin-bottom: 10px;">
                📭 Belum Ada Project
            </h3>
            <p style="font-size: 1.1rem;">
                Segera tambahkan project Anda!
            </p>
        </div>
    @endforelse
</section>

<div class="center fade-in">
    <a href="{{ url('/') }}" class="btn-back">⬅️ Kembali ke Portfolio</a>
</div>

<style>
    .project-card a:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
</style>

@endsection
