<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
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
}
