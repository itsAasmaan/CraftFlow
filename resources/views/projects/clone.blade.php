<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Clone Project: {{ $project->name }}
    </h2>

    <div class="p-6">
        <form method="POST" action="{{ route('projects.clone.store', $project) }}" class="space-y-6">
            @csrf

            <!-- New Project Name -->
            <div>
                <label for="name" class="block mb-1">New Project Name</label>
                <input type="text" id="name" name="name" class="w-full border p-2 rounded" required>
            </div>

            <!-- Tasks reassignment -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Assign Tasks</h3>
                @foreach($project->tasks as $task)
                    <div class="border rounded p-3 mb-3">
                        <p class="font-medium">{{ $task->title }}</p>
                        <label for="task_{{ $task->id }}" class="block text-sm">Assign To:</label>
                        <select name="tasks[{{ $task->id }}]" id="task_{{ $task->id }}"
                                class="border p-2 rounded w-full">
                            <option value="">-- Unassigned --</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded">
                Create Project
            </button>
        </form>
    </div>
</x-app-layout>
