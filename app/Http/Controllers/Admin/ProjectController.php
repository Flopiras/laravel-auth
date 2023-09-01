<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|string|max:50|unique:projects',
                'content' => 'nullable|string',
                'image' => 'nullable|url',
                'url' => 'nullable|url',
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.unique' => 'Questo titolo esiste già',
                'title.max:50' => 'Il titolo non può essere più lungo di 50 caratteri',
                'url.url' => "L'Url deve essere un link valido",
                'image.url' => "L'Url deve essere un link valido"
            ]
        );

        $data = $request->all();
        $project = new project();
        $project->fill($data);
        $project->slug = Str::slug($project->title, '-');
        $project->save();

        return to_route('admin.projects.show', $project)
            ->with('alert-message', 'Progetto aggiunto con successo')
            ->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('type', 'success')->with('message', 'Il progetto è stato eliminato con successo!');
    }
}
