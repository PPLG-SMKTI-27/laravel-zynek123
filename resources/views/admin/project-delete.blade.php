@extends('layouts.app')

@section('title', 'Hapus Project')

@section('content')
<section>
    <div class="delete-container" style="max-width: 500px; margin: 0 auto; text-align: center;">
        <div style="background: #ffcdd2; border: 6px solid #c62828; padding: 40px; border-radius: 10px; box-shadow: 10px 10px 0 rgba(0,0,0,0.2);">
            <h2 style="font-family: 'Luckiest Guy', cursive; font-size: 2.5rem; color: #b71c1c; margin-bottom: 20px; text-transform: uppercase;">
                ⚠️ Hapus Project?
            </h2>

            <div style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 3px solid #c62828;">
                <h3 style="font-family: 'Bangers', cursive; font-size: 1.8rem; color: #333; margin-bottom: 10px;">
                    {{ $project->title }}
                </h3>
                <p style="color: #666; line-height: 1.6;">
                    {{ Str::limit($project->description, 150) }}
                </p>
            </div>

            <p style="font-size: 1.1rem; color: #b71c1c; font-weight: bold; margin-bottom: 30px;">
                🔥 Aksi ini tidak bisa dibatalkan!
            </p>

            <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn-delete" 
                    style="background: #d32f2f; border: 4px solid #b71c1c; box-shadow: 0 6px 0 #7f0000; padding: 15px 35px; color: white; font-family: 'Bangers', cursive; font-size: 1.3rem; border-radius: 8px; cursor: pointer; transition: 0.1s; margin-right: 10px;">
                    🗑️ HAPUS!
                </button>
            </form>

            <a href="{{ route('dashboard') }}" class="btn-cancel" 
                style="background: #4caf50; border: 4px solid #2e7d32; box-shadow: 0 6px 0 #1b5e20; padding: 15px 35px; color: white; text-decoration: none; font-family: 'Bangers', cursive; font-size: 1.3rem; border-radius: 8px; display: inline-block; transition: 0.1s;">
                ❌ Batal
            </a>
        </div>
    </div>
</section>

<style>
    button:hover, a:hover {
        transform: translateY(-2px);
    }

    button:active, a:active {
        transform: translateY(4px);
    }
</style>
@endsection
