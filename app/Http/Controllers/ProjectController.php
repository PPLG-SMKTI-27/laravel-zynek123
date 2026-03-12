<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        

        return view('project', [
            'projects' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.project-show', compact('project'));
    }

    public function create()
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }
        
        return view('admin.project-create');
    }

    public function store(Request $request)
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $tags = array_map('trim', explode(',', $validated['tags']));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $validated['image'] = 'img/' . $imageName;
        }

        $validated['tags'] = $tags;

        Project::create($validated);

        return redirect('/dashboard')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }

        $project = Project::findOrFail($id);
        
        return view('admin.project-edit', compact('project'));
    }

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

        if ($request->hasFile('image')) {
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

    public function destroy($id)
    {
        if (!session('login')) {
            return redirect('/')->with('error', 'Login dulu!');
        }

        $project = Project::findOrFail($id);

        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        $project->delete();

        return redirect('/dashboard')->with('success', 'Project berhasil dihapus!');
    }
}
