<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeTaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')
            ->where('assigned_to', Auth::id())
            ->paginate(10);

        return view('employee.tasks.index', compact('tasks'));
    }

    public function edit(Task $task)
    {
        if ($task->assigned_to !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('employee.tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->assigned_to !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'status' => 'required|in:todo,in_progress,done',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return redirect()->route('employee.tasks.index')->with('success', 'Task status updated.');
    }
}
