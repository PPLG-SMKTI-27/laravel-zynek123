<?php

/**
 * CONTOH PENGGUNAAN PROJECT MANAGEMENT SYSTEM
 * File ini menunjukkan cara menggunakan semua fungsi yang tersedia
 */

// ============================================
// 1. MODEL - PROJECT.PHP
// ============================================

use App\Models\Project;

// Membuat project baru
$project = Project::create([
    'title' => 'Website Portfolio',
    'description' => 'Portfolio pribadi menggunakan Laravel dan Vue.js',
    'tags' => ['Laravel', 'Vue.js', 'MySQL', 'CSS'],
    'link' => 'https://example.com',
    'image' => 'img/portfolio.jpg'
]);

// Mengambil semua projects
$allProjects = Project::all();

// Mengambil project tertentu
$project = Project::find(1);
$project = Project::where('title', 'Website Portfolio')->first();

// Mengupdate project
$project->update([
    'title' => 'Portfolio Terbaru',
    'description' => 'Deskripsi yang diubah'
]);

// Menghapus project
$project->delete();

// Query collections
$projects = Project::where('title', 'like', '%Website%')->get();
$projects = Project::latest()->take(5)->get();
$projectCount = Project::count();


// ============================================
// 2. CONTROLLER - PROJECTCONTROLLER.PHP
// ============================================

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // ✅ INDEX - Tampilkan semua project
    public function index()
    {
        $projects = Project::all();
        return view('project', compact('projects'));
    }

    // ✅ CREATE - Tampilkan form tambah
    public function create()
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }
        return view('admin.project-create');
    }

    // ✅ STORE - Simpan project baru
    public function store(Request $request)
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }

        // Validasi
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Process tags dari string menjadi array
        $tags = array_map('trim', explode(',', $validated['tags']));

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $validated['image'] = 'img/' . $imageName;
        }

        $validated['tags'] = $tags;

        // Buat project
        Project::create($validated);

        return redirect('/dashboard')->with('success', 'Project berhasil ditambahkan!');
    }

    // ✅ EDIT - Tampilkan form edit
    public function edit($id)
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }

        $project = Project::findOrFail($id);
        return view('admin.project-edit', compact('project'));
    }

    // ✅ UPDATE - Update project
    public function update(Request $request, $id)
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }

        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $tags = array_map('trim', explode(',', $validated['tags']));

        // Update gambar jika ada yang baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $validated['image'] = 'img/' . $imageName;
        }

        $validated['tags'] = $tags;
        $project->update($validated);

        return redirect('/dashboard')->with('success', 'Project berhasil diupdate!');
    }

    // ✅ DESTROY - Hapus project
    public function destroy($id)
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }

        $project = Project::findOrFail($id);

        // Hapus gambar
        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        $project->delete();

        return redirect('/dashboard')->with('success', 'Project berhasil dihapus!');
    }
}


// ============================================
// 3. BLADE TEMPLATES - CONTOH PENGGUNAAN
// ============================================

// FILE: resources/views/project.blade.php
?>

@extends('layouts.app')

@section('title', 'Project')

@section('content')
    <section class="project-grid">
        @forelse ($projects as $project)
            <div class="project-card">
                @if ($project->image)
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                @endif

                <h3>{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>

                {{-- Tampilkan tags sebagai badges --}}
                @if ($project->tags)
                    @foreach ($project->tags as $tag)
                        <span class="tag">{{ $tag }}</span>
                    @endforeach
                @endif

                {{-- Link project jika ada --}}
                @if ($project->link)
                    <a href="{{ $project->link }}" target="_blank">
                        🔗 Kunjungi Project
                    </a>
                @endif
            </div>
        @empty
            <p>Belum ada project</p>
        @endforelse
    </section>
@endsection

<?php
// FILE: resources/views/admin/dashboard.blade.php
?>

@section('content')
    <h2>🎯 KELOLA PROJECT</h2>

    {{-- Tombol tambah --}}
    <a href="{{ route('project.create') }}" class="btn-add">
        ➕ Tambah Project Baru
    </a>

    {{-- Tabel project --}}
    @if ($projects->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ Str::limit($project->description, 50) }}</td>
                        <td>
                            {{-- Edit button --}}
                            <a href="{{ route('project.edit', $project->id) }}" class="btn-edit">
                                ✏️ Edit
                            </a>

                            {{-- Delete button --}}
                            <a href="{{ route('project.destroy', $project->id) }}" 
                               onclick="return confirm('Yakin hapus?')" 
                               class="btn-delete">
                                🗑️ Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada project. <a href="{{ route('project.create') }}">Tambah sekarang!</a></p>
    @endif
@endsection

<?php
// FILE: resources/views/admin/project-create.blade.php
?>

@extends('layouts.app')

@section('content')
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <input type="text" name="title" placeholder="Judul Project" 
               value="{{ old('title') }}" required>

        {{-- Description --}}
        <textarea name="description" placeholder="Deskripsi Project" required>
            {{ old('description') }}
        </textarea>

        {{-- Tags (comma separated) --}}
        <input type="text" name="tags" placeholder="Tags (misal: Laravel, Vue.js, MySQL)" 
               value="{{ old('tags') }}" required>

        {{-- Link (optional) --}}
        <input type="url" name="link" placeholder="Link Project (opsional)" 
               value="{{ old('link') }}">

        {{-- Image (optional) --}}
        <input type="file" name="image" accept="image/*">

        <button type="submit">✅ Simpan Project</button>
        <a href="{{ route('dashboard') }}" class="btn-cancel">❌ Batal</a>
    </form>
@endsection

<?php
// ============================================
// 4. DATABASE QUERIES - CONTOH ADVANCED
// ============================================

use App\Models\Project;

// Cari project berdasarkan tag
$laravelProjects = Project::where('tags', 'like', '%Laravel%')->get();

// Urutkan project terbaru
$newestProjects = Project::latest()->take(5)->get();

// Hitung total projects
$totalProjects = Project::count();

// Filter projects dengan gambar
$projectsWithImage = Project::whereNotNull('image')->get();

// Filter projects dengan link
$projectsWithLink = Project::whereNotNull('link')->get();

// Cari menggunakan LIKE
$searchResults = Project::where('title', 'like', '%Portfolio%')
                        ->orWhere('description', 'like', '%Portfolio%')
                        ->get();

// Paginate results
$projects = Project::paginate(10);

// Get dengan relasi (jika ada)
$recentProjects = Project::latest()->limit(3)->get();


// ============================================
// 5. FILE MANAGEMENT
// ============================================

// Menyimpan file
$file = $request->file('image');
$fileName = time() . '.' . $file->getClientOriginalExtension();
$file->move(public_path('img'), $fileName);

// Menghapus file
if (file_exists(public_path($imagePath))) {
    unlink(public_path($imagePath));
}

// Cek file ada
$exists = File::exists(public_path('img/photo.jpg'));

// Get file size
$size = filesize(public_path($filePath));


// ============================================
// 6. FORM VALIDATION
// ============================================

$validated = $request->validate([
    'title' => 'required|string|max:255',              // Required, string, max 255 char
    'description' => 'required|string',                // Required, string
    'tags' => 'required|string',                       // Required, string format
    'link' => 'nullable|url',                          // Optional, must be valid URL
    'image' => 'nullable|image|mimes:jpeg,png|max:2048' // Optional, image only, max 2MB
]);

// Custom validation messages
$messages = [
    'title.required' => 'Judul project harus diisi!',
    'image.max' => 'Ukuran gambar maksimal 2MB',
    'link.url' => 'Link harus URL yang valid'
];

$validated = $request->validate([
    'title' => 'required|string|max:255',
], $messages);


// ============================================
// 7. RESPONSE & REDIRECT
// ============================================

// Redirect dengan message
return redirect('/dashboard')->with('success', 'Project berhasil ditambahkan!');
return redirect()->back()->with('error', 'Ada kesalahan!');

// Redirect dengan input
return redirect()->back()->withInput();

// JSON Response
return response()->json(['message' => 'Success'], 200);

// ============================================
// 8. AUTHENTICATION CHECK
// ============================================

// Cek session login
if (!session('login')) {
    return redirect('/')->with('error', 'Login dulu!');
}

// Get session value
$email = session('email');
$userId = session('user_id');

// Set session
session(['login' => true, 'email' => 'user@example.com']);

/**
 * ✅ Semua contoh di atas sudah diimplementasikan dalam sistem
 * Anda tinggal meng-explore dan menggunakannya!
 */
?>
