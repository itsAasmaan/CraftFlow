<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\Prototype\ProjectPrototype;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tasks')->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create([
            'company_id'  => 1,
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created!');
    }

    public function show(Project $project)
    {
        $project->load('tasks.assignee'); // eager load
        $employees = User::all();
        return view('projects.show', compact('project', 'employees'));
    }

    public function createFromTemplate(Project $project)
    {
        $employees = \App\Models\User::all();
        return view('projects.clone', compact('project', 'employees'));
    }

    public function storeFromTemplate(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tasks' => 'array'
        ]);

        $newProject = ProjectPrototype::clone($project, $request->name, $request->tasks ?? []);

        return redirect()->route('projects.index')
                         ->with('success', "Project '{$newProject->name}' created from template!");
    }
}
