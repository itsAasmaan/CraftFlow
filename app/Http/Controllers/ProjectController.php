<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\Prototype\ProjectPrototype;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tasks')->get();
        return view('projects.index', compact('projects'));
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
