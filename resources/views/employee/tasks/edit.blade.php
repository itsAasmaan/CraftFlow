<x-app-layout>
     @section('header')
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
             {{ __('Update Task Status') }}
         </h2>
     @endsection
 

     <div class="py-12">
         <div class="mx-auto max-w-md sm:px-6 lg:px-8">
             <div class="overflow-hidden rounded-lg bg-white p-8 shadow-md">
                 <form method="POST" action="{{ route('employee.tasks.update', $task) }}" class="space-y-6">
                     @csrf
                     @method('PUT')
 

                     <div>
                         <label class="block text-sm font-medium text-gray-700">Task</label>
                         <p class="mt-1 text-lg font-bold text-gray-900">{{ $task->title }}</p>
                     </div>
 

                     <div>
                         <label class="block text-sm font-medium text-gray-700">Project</label>
                         <p class="mt-1 text-lg font-bold text-gray-900">{{ $task->project->name }}</p>
                     </div>
 

                     <div>
                         <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                         <div class="mt-1">
                             <select name="status" id="status"
                                     class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                 <option value="todo" @selected(old('status', $task->status) === 'todo')>Pending</option>
                                 <option value="in_progress" @selected(old('status', $task->status) === 'in_progress')>In Progress</option>
                                 <option value="done" @selected(old('status', $task->status) === 'done')>Completed</option>
                             </select>
                         </div>
                     </div>
 

                     <div class="flex items-center justify-end gap-4">
                         <a href="{{ route('employee.tasks.index') }}"
                            class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition-colors duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                             Cancel
                         </a>
                         <button type="submit"
                                 class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                             Update Status
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </x-app-layout>