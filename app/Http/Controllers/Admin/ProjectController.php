<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('admin/projects/Index', [
            'projects' => Project::orderBy('position')->get(['id', 'title', 'slug', 'published_at']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('admin/projects/Create', [
            'tags' => Tag::orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function store(ProjectRequest $request): RedirectResponse
    {
        $data = $request->safe()->except(['tags', 'cover']);

        if ($request->hasFile('cover')) {
            $data['cover_path'] = $request->file('cover')->store('projects', 'public');
        }

        $project = Project::create([
            ...$data,
            'position' => Project::max('position') + 1,
        ]);

        $project->tags()->sync($request->validated('tags', []));

        Inertia::flash('toast', ['type' => 'success', 'message' => 'Projet créé.']);

        return to_route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): Response
    {
        $project->load('tags');

        return Inertia::render('admin/projects/Edit', [
            'project' => [
                'id' => $project->id,
                'title' => $project->title,
                'summary' => $project->summary,
                'content' => $project->content,
                'demo_url' => $project->demo_url,
                'repo_url' => $project->repo_url,
                ...$project->only('id', 'title', 'summary', 'content', 'demo_url', 'repo_url', 'cover_url'),

                'tags' => $project->tags->pluck('id')->all(),
            ],
            'tags' => Tag::orderBy('name')->get(['id', 'name']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project): RedirectResponse
    {
        $data = $request->safe()->except(['tags', 'cover']);

        if ($request->hasFile('cover')) {
            if ($project->cover_path && str_starts_with($project->cover_path, 'projects/')) {
                Storage::disk('public')->delete($project->cover_path);
            }

            $data['cover_path'] = $request->file('cover')->store('projects', 'public');
        }

        $project->update($data);

        $project->tags()->sync($data['tags'] ?? []);

        return to_route('admin.projects.index')
            ->with('success', 'Projet modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        if ($project->cover_path && str_starts_with($project->cover_path, 'projects/')) {
            Storage::disk('public')->delete($project->cover_path);
        }

        $project->delete();

        return to_route('admin.projects.index')
            ->with('success', 'Projet supprimé.');
    }

    public function togglePublished(Project $project): RedirectResponse
    {
        $project->update([
            'published_at' => $project->published_at ? null : now(),
        ]);

        Inertia::flash('toast', [
            'type' => 'success',
            'message' => $project->published_at ? 'Projet publié.' : 'Projet repassé en brouillon.',
        ]);

        return to_route('admin.projects.index');
    }
}
