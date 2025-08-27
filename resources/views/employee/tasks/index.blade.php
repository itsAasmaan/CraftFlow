<x-app-layout>
     @section('header')
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
             {{ __('My Tasks') }}
         </h2>
     @endsection
 

     <div class="py-12">
         <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
             @if(session('success'))
                 <div class="mb-6 rounded-md bg-green-100 p-4 text-green-700">
                     {{ session('success') }}
                 </div>
             @endif
 

             <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                 <div class="overflow-x-auto">
                     <table class="min-w-full divide-y divide-gray-200">
                         <thead class="bg-gray-50">
                             <tr>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                     Task
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                     Project
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                     Status
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                     Actions
                                 </th>
                             </tr>
                         </thead>
                         <tbody class="divide-y divide-gray-200 bg-white">
                             @forelse($tasks as $task)
                                 <tr>
                                     <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                         {{ $task->title }}
                                     </td>
                                     <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                         {{ $task->project->name }}
                                     </td>
                                     <td class="whitespace-nowrap px-6 py-4 text-sm">
                                         <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5
                                         {{ $task->status === 'to_do' ? 'bg-red-100 text-red-800' : '' }}
                                         {{ $task->status === 'in_progress' ? 'bg-amber-100 text-amber-800' : '' }}
                                         {{ $task->status === 'done' ? 'bg-green-100 text-green-800' : '' }}
                                         ">
                                             {{ ucfirst(str_replace('_',' ',$task->status)) }}
                                         </span>
                                     </td>
                                     <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                         <a href="{{ route('employee.tasks.edit', $task) }}"
                                            class="text-blue-600 transition-colors duration-150 ease-in-out hover:text-blue-900">
                                            Update Status
                                         </a>
                                     </td>
                                 </tr>
                             @empty
                                 <tr>
                                     <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                         No tasks assigned yet.
                                     </td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                 </div>
                 @if ($tasks->hasPages())
                     <div class="border-t p-4">
                         {{ $tasks->links() }}
                     </div>
                 @endif
             </div>
         </div>
     </div>
 </x-app-layout>