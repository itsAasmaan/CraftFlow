<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Project: :name', ['name' => $project->name]) }}
    </h2>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">
                            {{ __('Details') }}
                        </h3>
                        <p class="text-lg text-gray-600">
                            {{ $project->description }}
                        </p>
                    </div>

                    <div class="mt-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">
                                {{ __('Tasks') }}
                            </h3>
                        </div>
                        
                        <div class="space-y-4">
                            @forelse($project->tasks as $task)
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-5 shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <p class="font-semibold text-gray-800">
                                            {{ $task->title }}
                                        </p>
                                        <span class="text-sm font-medium {{ match($task->status) {
                                            'completed' => 'text-green-600',
                                            'in_progress' => 'text-blue-600',
                                            default => 'text-gray-500',
                                        } }}">
                                            {{ ucwords(str_replace('_', ' ', $task->status)) }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">
                                        {{ __('Assigned to: :name', ['name' => $task->assignee->name ?? 'Unassigned']) }}
                                    </p>

                                    <form action="{{ route('tasks.update.assignment', $task) }}" method="POST" class="mt-4 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                                        @csrf
                                        
                                        <div class="w-full sm:w-auto">
                                            <label for="status-{{ $task->id }}" class="sr-only">{{ __('Status') }}</label>
                                            <select name="status" id="status-{{ $task->id }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                                <option value="pending" {{ $task->status == 'todo' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                                                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>{{ __('In Progress') }}</option>
                                                <option value="completed" {{ $task->status == 'done' ? 'selected' : '' }}>{{ __('Completed') }}</option>
                                            </select>
                                        </div>

                                        <div class="w-full sm:w-auto">
                                            <label for="assigned_to-{{ $task->id }}" class="sr-only">{{ __('Assignee') }}</label>
                                            <select name="assigned_to" id="assigned_to-{{ $task->id }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                                <option value="">{{ __('-- Unassigned --') }}</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{ $employee->id }}" 
                                                        {{ $task->assigned_to == $employee->id ? 'selected' : '' }}>
                                                        {{ $employee->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="flex-shrink-0">
                                            {!! $themeFactory->createButton(__('Update'))->render() !!}
                                        </div>
                                    </form>
                                </div>
                            @empty
                                <div class="text-center py-8 text-gray-500">
                                    {{ __('No tasks for this project yet.') }}
                                </div>
                            @endforelse
                        </div>

                        <div class="mt-8 border border-gray-200 rounded-lg p-6 bg-white shadow-sm">
                            <h3 class="text-xl font-bold mb-4 text-gray-900">{{ __('Add New Task') }}</h3>
                            <form action="{{ route('tasks.store', $project) }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Task Title') }}</label>
                                    <div class="mt-1">
                                        <input type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>
                                </div>

                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                                    <div class="mt-1">
                                        <select name="status" id="status" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            <option value="todo">{{ __('Pending') }}</option>
                                            <option value="in_progress">{{ __('In Progress') }}</option>
                                            <option value="done">{{ __('Completed') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="assigned_to" class="block text-sm font-medium text-gray-700">{{ __('Assign To') }}</label>
                                    <div class="mt-1">
                                        <select name="assigned_to" id="assigned_to" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            <option value="">{{ __('-- Unassigned --') }}</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    {!! $themeFactory->createButton(__('Add Task'))->render() !!}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>