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
        $companies = \App\Models\Company::all();
        return view('projects.create', compact('companies'));
    }

    public function edit(Project $project)
    {
        $companies = \App\Models\Company::all();
        return view('projects.edit', compact('project', 'companies'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
        ]);

        $project->update([
            'company_id'  => $request->company_id,
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
        ]);

        Project::create([
            'company_id'  => $request->company_id,
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
        $companies = \App\Models\Company::all();

        return view('projects.clone', compact('project', 'employees', 'companies'));
    }

    public function storeFromTemplate(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'tasks' => 'array'
        ]);

        $newProject = ProjectPrototype::clone($project, $request->name, $request->tasks ?? []);

        return redirect()->route('projects.index')->with('success', "Project '{$newProject->name}' created from template!");
    }
}
