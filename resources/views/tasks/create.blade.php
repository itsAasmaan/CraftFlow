<x-app-layout>
     @section('header')
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
             {{ __('Create Task') }}
         </h2>
     @endsection
 

     <div class="py-12">
         <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
             <div class="overflow-hidden rounded-lg bg-white p-8 shadow-md">
                 <form method="POST" action="{{ route('tasks.store.individually') }}" class="space-y-6">
                     @csrf
                     <div>
                         <label for="project_id" class="block text-sm font-medium text-gray-700">Project</label>
                         <div class="mt-1">
                             <select name="project_id" id="project_id"
                                     class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                 @foreach($projects as $project)
                                     <option value="{{ $project->id }}">{{ $project->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
 

                     <div>
                         <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                         <div class="mt-1">
                             <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                         </div>
                         @error('title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                     </div>
 

                     <div>
                         <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                         <div class="mt-1">
                             <select name="status" id="status"
                                     class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                 <option value="todo">Pending</option>
                                 <option value="in_progress">In Progress</option>
                                 <option value="done">Completed</option>
                             </select>
                         </div>
                     </div>
 

                     <div>
                         <label for="assigned_to" class="block text-sm font-medium text-gray-700">Assign To</label>
                         <div class="mt-1">
                             <select name="assigned_to" id="assigned_to"
                                     class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                 <option value="">-- None --</option>
                                 @foreach($employees as $employee)
                                     <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
 

                     <div class="flex items-center justify-end">
                         <button type="submit"
                                 class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                             Create Task
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </x-app-layout>