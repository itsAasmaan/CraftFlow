<x-app-layout>
    <h2 class="font-semibold text-xl">Create Project</h2>
    <div class="p-6">
        <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block">Name</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block">Description</label>
                <textarea name="description" class="w-full border rounded p-2"></textarea>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
