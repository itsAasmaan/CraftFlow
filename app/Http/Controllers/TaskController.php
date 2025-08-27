<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['project', 'assignee'])->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        $employees = User::where('role', 'employee')->get();
        return view('tasks.create', compact('projects', 'employees'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'project_id'  => 'required|exists:projects,id',
            'title'       => 'required|string|max:255',
            'status'      => 'required|in:todo,in_progress,done',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        Task::create([
            'project_id'  => $project->id,
            'title'       => $request->title,
            'status'      => $request->status,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()->route('projects.show', $project)
                         ->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        $employees = User::where('role', 'employee')->get();
        return view('tasks.edit', compact('task', 'projects', 'employees'));
    }

    public function storeIndividually(Request $request)
    {
        $request->validate([
            'project_id'  => 'required|exists:projects,id',
            'title'       => 'required|string|max:255',
            'status'      => 'required|in:todo,in_progress,done',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function updateIndividually(Request $request, Task $task)
    {
        $request->validate([
            'project_id'  => 'required|exists:projects,id',
            'title'       => 'required|string|max:255',
            'status'      => 'required|in:todo,in_progress,done',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'assigned_to' => 'nullable|exists:users,id',
            'status'      => 'required|string|in:todo,in_progress,done',
        ]);

        $task->update([
            'assigned_to' => $request->assigned_to,
            'status'      => $request->status,
        ]);

        return back()->with('success', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
