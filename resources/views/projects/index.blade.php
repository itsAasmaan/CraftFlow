<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Projects') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">
                        {{ __('All Projects') }}
                    </h3>
                    <a href="{{ route('projects.create') }}">
                        {!! $themeFactory->createButton(__('New Project'))->render() !!}
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($projects as $project)
                        <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-sm p-5 transition-all duration-300 hover:shadow-md">
                            <div class="flex justify-between items-start">
                                <h4 class="font-bold text-lg text-gray-800">
                                    {{ $project->name }}
                                </h4>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-0.5 text-sm font-medium text-blue-800">
                                        {{ $project->tasks->count() }} {{ __('tasks') }}
                                    </span>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600 truncate">
                                {{ $project->description }}
                            </p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 rounded-md hover:bg-indigo-50">
                                    {{ __('View') }}
                                </a>
                                <a href="{{ route('projects.clone', $project) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-md border border-gray-300 bg-white hover:bg-gray-100">
                                    {{ __('Clone') }}
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-gray-500">
                            {{ __('No projects found. Start by creating a new one!') }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>