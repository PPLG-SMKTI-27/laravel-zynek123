@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<section>
    <div class="form-container" style="max-width: 600px; margin: 0 auto;">
        <h2 style="font-family: 'Luckiest Guy', cursive; font-size: 2.5rem; color: var(--primary); margin-bottom: 30px; text-align: center; text-transform: uppercase;">
            ✏️ Edit Project
        </h2>

        @if ($errors->any())
            <div class="alert alert-error" style="background: #ffebee; border: 4px solid #c62828; padding: 15px; border-radius: 8px; margin-bottom: 20px; color: #b71c1c;">
                <strong>Oops! Ada kesalahan:</strong>
                <ul style="margin-top: 10px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data" style="background: var(--card); padding: 30px; border: 6px solid var(--border-wood); box-shadow: 10px 10px 0 rgba(0,0,0,0.2);">
            @csrf
            @method('PUT')

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1rem; font-family: 'Bangers', cursive;">
                    📝 Judul Project
                </label>
                <input type="text" name="title" placeholder="Contoh: Website Toko Online" 
                    value="{{ old('title', $project->title) }}"
                    style="width: 100%; padding: 12px; border: 3px solid var(--border-wood); border-radius: 5px; font-size: 1rem; font-family: 'Montserrat', sans-serif;" required>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1rem; font-family: 'Bangers', cursive;">
                    📄 Deskripsi
                </label>
                <textarea name="description" placeholder="Jelaskan project Anda..." rows="5"
                    style="width: 100%; padding: 12px; border: 3px solid var(--border-wood); border-radius: 5px; font-size: 1rem; font-family: 'Montserrat', sans-serif; resize: vertical;" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1rem; font-family: 'Bangers', cursive;">
                    🏷️ Tags (pisahkan dengan koma)
                </label>
                <input type="text" name="tags" placeholder="Contoh: Laravel, Vue.js, MySQL" 
                    value="{{ old('tags', is_array($project->tags) ? implode(', ', $project->tags) : $project->tags) }}"
                    style="width: 100%; padding: 12px; border: 3px solid var(--border-wood); border-radius: 5px; font-size: 1rem; font-family: 'Montserrat', sans-serif;" required>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1rem; font-family: 'Bangers', cursive;">
                    🔗 Link Project (Opsional)
                </label>
                <input type="url" name="link" placeholder="https://example.com" 
                    value="{{ old('link', $project->link) }}"
                    style="width: 100%; padding: 12px; border: 3px solid var(--border-wood); border-radius: 5px; font-size: 1rem; font-family: 'Montserrat', sans-serif;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: bold; font-size: 1.1rem; font-family: 'Bangers', cursive;">
                    🖼️ Gambar (Opsional)
                </label>
                @if ($project->image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" style="max-width: 150px; border: 3px solid var(--border-wood); border-radius: 5px;">
                        <p style="font-size: 0.9rem; margin-top: 5px; color: #666;">Gambar saat ini</p>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                    style="width: 100%; padding: 12px; border: 3px solid var(--border-wood); border-radius: 5px; font-size: 1rem;">
                <small style="display: block; margin-top: 5px; color: #666;">Kosongkan jika tidak ingin mengganti gambar</small>
            </div>

            <div class="button-group" style="display: flex; gap: 10px; justify-content: center;">
                <button type="submit" class="btn-submit" 
                    style="background: #4caf50; border: 4px solid #2e7d32; box-shadow: 0 6px 0 #1b5e20; padding: 15px 35px; color: white; font-family: 'Bangers', cursive; font-size: 1.2rem; border-radius: 8px; cursor: pointer; transition: 0.1s;">
                    ✅ Update Project
                </button>

                <a href="{{ route('dashboard') }}" class="btn-cancel" 
                    style="background: #ff9800; border: 4px solid #e65100; box-shadow: 0 6px 0 #bf360c; padding: 15px 35px; color: white; text-decoration: none; font-family: 'Bangers', cursive; font-size: 1.2rem; border-radius: 8px; display: inline-block; transition: 0.1s;">
                    ❌ Batal
                </a>
            </div>
        </form>
    </div>
</section>

<style>
    input:focus, textarea:focus {
        outline: none;
        background: #fff9c4;
        border-color: var(--primary) !important;
    }

    button:hover {
        transform: translateY(-2px);
    }

    button:active {
        transform: translateY(4px);
    }
</style>
@endsection
