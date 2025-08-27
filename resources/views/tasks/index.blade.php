<x-app-layout>
    <x-slot name="header">
        {{ __('Tasks') }}
    </x-slot>

    <div class="max-w-7xl mx-auto mt-6">
        <a href="{{ route('tasks.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded shadow">+ New Task</a>

        <div class="mt-6 bg-white shadow rounded p-6">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-3 py-2">Title</th>
                        <th class="border px-3 py-2">Project</th>
                        <th class="border px-3 py-2">Assigned To</th>
                        <th class="border px-3 py-2">Status</th>
                        <th class="border px-3 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="border px-3 py-2">{{ $task->title }}</td>
                            <td class="border px-3 py-2">{{ $task->project->name }}</td>
                            <td class="border px-3 py-2">{{ $task->assignee?->name ?? '-' }}</td>
                            <td class="border px-3 py-2">{{ ucfirst(str_replace('_',' ',$task->status)) }}</td>
                            <td class="border px-3 py-2">
                                <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600">Edit</a> |
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600" onclick="return confirm('Delete task?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">{{ $tasks->links() }}</div>
        </div>
    </div>
</x-app-layout>
