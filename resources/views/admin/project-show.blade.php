@extends('layouts.app')

@section('title', $project->title)

@section('content')

<header class="fade-in">
    <h1>{{ $project->title }}</h1>
</header>

<section style="max-width: 900px; margin: 0 auto; padding: 20px;">
    
    <div class="project-detail" style="background: var(--card); border: 6px solid var(--border-wood); padding: 30px; border-radius: 8px; box-shadow: 10px 10px 0 rgba(0,0,0,0.2);">
        
        @if ($project->image)
            <div style="margin-bottom: 30px; border-radius: 8px; overflow: hidden; max-height: 400px;">
                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: auto; border: 6px solid var(--border-wood);">
            </div>
        @endif

        <div style="background: #f1f8e9; color: #333; padding: 25px; border-radius: 8px; margin-bottom: 30px; border: 3px solid var(--border-wood);">
            <h2 style="font-family: 'Bangers', cursive; font-size: 2rem; color: #2e7d32; margin-bottom: 15px;">
                {{ $project->title }}
            </h2>
            
            <p style="line-height: 1.8; font-size: 1.1rem; margin-bottom: 20px;">
                {{ $project->description }}
            </p>

            @if ($project->tags)
                <div style="margin: 20px 0;">
                    <strong style="display: block; margin-bottom: 10px; font-family: 'Bangers', cursive; font-size: 1.2rem;">
                        🏷️ Tags:
                    </strong>
                    @foreach ($project->tags as $tag)
                        <span class="tag" style="display: inline-block; background: var(--zombie-skin); color: white; padding: 8px 15px; border-radius: 5px; font-size: 0.95rem; font-weight: bold; margin-right: 8px; margin-bottom: 8px; text-transform: uppercase; border: 2px solid var(--border-wood);">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            @endif

            @if ($project->link)
                <div style="margin-top: 20px;">
                    <a href="{{ $project->link }}" target="_blank" style="display: inline-block; background: var(--primary); color: #000; padding: 15px 35px; text-decoration: none; border-radius: 8px; font-weight: bold; font-family: 'Bangers', cursive; font-size: 1.2rem; border: 4px solid var(--border-wood); box-shadow: 0 6px 0 rgba(0,0,0,0.3); transition: 0.1s;">
                        🔗 Kunjungi Project
                    </a>
                </div>
            @endif
        </div>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 3px solid var(--border-wood);">
            <small style="color: #666; display: block; margin-bottom: 15px;">
                📅 Dibuat: {{ $project->created_at->format('d M Y H:i') }}
                @if ($project->updated_at != $project->created_at)
                    | 🔄 Diupdate: {{ $project->updated_at->format('d M Y H:i') }}
                @endif
            </small>
        </div>

    </div>

</section>

<div class="center fade-in" style="margin-top: 40px; margin-bottom: 40px;">
    <a href="{{ url('/project') }}" class="btn-back" style="display: inline-block; background: #ff9800; border: 4px solid #e65100; box-shadow: 0 6px 0 #bf360c; padding: 15px 35px; color: white; text-decoration: none; font-family: 'Bangers', cursive; font-size: 1.2rem; border-radius: 8px; transition: 0.1s;">
        ⬅️ Kembali ke Project
    </a>
</div>

<style>
    .project-detail a:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    .project-detail a:active {
        transform: translateY(4px);
    }
</style>

@endsection
