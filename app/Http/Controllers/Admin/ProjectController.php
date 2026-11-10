<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Requests\ProjectRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(): Response
{
    return Inertia::render('admin/projects/Index', [
        'projects' => Project::orderBy('position')->get(['id', 'title', 'slug']),
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
    $project = Project::create([
        ...$request->safe()->except('tags'),
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
    $data = $request->validated();

    $project->update(collect($data)->except('tags')->all());

    $project->tags()->sync($data['tags'] ?? []);

    return to_route('admin.projects.index')
        ->with('success', 'Projet modifié.');
}


    /**
     * Remove the specified resource from storage.
     */

public function destroy(Project $project): RedirectResponse
{
    $project->delete();

    return to_route('admin.projects.index')
        ->with('success', 'Projet supprimé.');
}

}
