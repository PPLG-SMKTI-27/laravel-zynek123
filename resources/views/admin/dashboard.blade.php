@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<header>
    <h1>DASHBOARD ADMIN</h1>
</header>

<section style="text-align:center">

    <h2 style="font-family: 'Luckiest Guy', cursive; font-size: 2rem; margin-bottom: 20px;">🎮 Selamat datang Admin</h2>

    <p style="font-size: 1.1rem; margin-bottom: 30px;">
        Login sebagai: <b style="color: var(--primary);">{{ session('email') ?? auth()->user()->email ?? 'Admin' }}</b>
    </p>

    @if (session('success'))
        <div style="background: #c8e6c9; border: 4px solid #2e7d32; color: #1b5e20; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-weight: bold;">
            ✅ {{ session('success') }}
        </div>
    @endif
    <!-- PORTFOLIO SECTION -->
    <div style="background: var(--card); border: 6px solid var(--border-wood); padding: 30px; border-radius: 8px; margin-bottom: 40px; box-shadow: 10px 10px 0 rgba(0,0,0,0.2);">
        <h3 style="font-family: 'Luckiest Guy', cursive; font-size: 1.8rem; color: var(--primary); margin-bottom: 25px;">📸 PORTFOLIO</h3>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px;">
            {{-- FOTO SLOT 1 --}}
            <form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slot" value="1">
                <input type="file" name="foto" hidden id="foto1" onchange="this.form.submit()">

                <label for="foto1" class="btn-back" style="cursor:pointer; display: block;">
                    🖼️ Edit Foto 1
                </label>
            </form>

            {{-- FOTO SLOT 2 --}}
            <form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slot" value="2">
                <input type="file" name="foto" hidden id="foto2" onchange="this.form.submit()">

                <label for="foto2" class="btn-back" style="cursor:pointer; display: block;">
                    🖼️ Edit Foto 2
                </label>
            </form>

            <a href="#" class="btn-back" style="display: block;">
                ✏️ Edit Tentang Saya
            </a>
        </div>
    </div>

    <!-- PROJECT MANAGEMENT SECTION -->
    <div style="background: var(--card); border: 6px solid var(--border-wood); padding: 30px; border-radius: 8px; margin-bottom: 40px; box-shadow: 10px 10px 0 rgba(0,0,0,0.2);">
        <h3 style="font-family: 'Luckiest Guy', cursive; font-size: 1.8rem; color: var(--primary); margin-bottom: 25px;">🎯 KELOLA PROJECT</h3>

        <a href="{{ route('project.create') }}" style="display: inline-block; background: #4caf50; border: 4px solid #2e7d32; box-shadow: 0 6px 0 #1b5e20; padding: 15px 35px; color: white; text-decoration: none; font-family: 'Bangers', cursive; font-size: 1.3rem; border-radius: 8px; margin-bottom: 20px; transition: 0.1s; cursor: pointer;"
            onmouseover="this.style.background='#66bb6a'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 0 #1b5e20';"
            onmouseout="this.style.background='#4caf50'; this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 0 #1b5e20';"
            onmousedown="this.style.transform='translateY(4px)'; this.style.boxShadow='0 2px 0 #1b5e20';"
            onmouseup="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 0 #1b5e20';">
            ➕ TAMBAH PROJECT BARU
        </a>

        @if ($projects && $projects->count() > 0)
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                    <thead>
                        <tr style="background: var(--border-wood); color: white;">
                            <th style="padding: 15px; border: 3px solid var(--border-wood); text-align: left; font-family: 'Bangers', cursive;">📌 Judul</th>
                            <th style="padding: 15px; border: 3px solid var(--border-wood); text-align: left; font-family: 'Bangers', cursive;">📝 Deskripsi</th>
                            <th style="padding: 15px; border: 3px solid var(--border-wood); text-align: center; font-family: 'Bangers', cursive;">🎬 Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr style="background: #f1f8e9; border-bottom: 3px solid var(--border-wood);">
                                <td style="padding: 15px; border: 3px solid var(--border-wood); color: #333; font-weight: bold;">{{ $project->title }}</td>
                                <td style="padding: 15px; border: 3px solid var(--border-wood); color: #666; max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ Str::limit($project->description, 50) }}</td>
                                <td style="padding: 15px; border: 3px solid var(--border-wood); text-align: center;">
                                    <a href="{{ route('project.edit', $project->id) }}" style="display: inline-block; background: #2196F3; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-family: 'Bangers', cursive; margin-right: 5px; transition: 0.1s;">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus project ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="display: inline-block; background: #f44336; color: white; padding: 8px 15px; border: none; border-radius: 5px; font-family: 'Bangers', cursive; cursor: pointer; transition: 0.1s;">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div style="background: #fff9c4; border: 4px solid #fbc02d; color: #f57f17; padding: 20px; border-radius: 8px; font-size: 1.1rem; font-family: 'Bangers', cursive;">
                📭 Belum ada project. <a href="{{ route('project.create') }}" style="color: #f57f17; text-decoration: underline; font-weight: bold;">Tambah sekarang!</a>
            </div>
        @endif
    </div>

    <!-- ACTION BUTTONS -->
    <div style="margin-top: 40px; display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
        <a href="{{ route('home') }}" class="btn-back" style="margin-bottom: 10px;">
            ⬅️ Kembali ke Portfolio
        </a>

        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn-back" style="margin-bottom: 10px;">
                🚪 Logout
            </button>
        </form>
    </div>

</section>

<style>
    table a:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    .btn-back:hover {
        transform: translateY(-2px);
    }

    .btn-back:active {
        transform: translateY(4px);
    }
</style>

@endsection