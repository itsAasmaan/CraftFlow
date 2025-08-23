<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Projects</h1>

        @if(session('success'))
            <div class="bg-green-200 p-2 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2">Tasks</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr class="border-t">
                        <td class="p-2">{{ $project->name }}</td>
                        <td class="p-2">{{ $project->tasks->count() }}</td>
                        <td class="p-2">
                            <a href="{{ route('projects.clone', $project) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded">Clone</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
