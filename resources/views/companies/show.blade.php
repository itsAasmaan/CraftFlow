<x-app-layout>
     @section('header')
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
             Company: {{ $company->name }}
         </h2>
     @endsection
 

     <div class="py-12">
         <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
             {{-- Company Details Card --}}
             <div class="mb-8 overflow-hidden rounded-lg bg-white shadow-sm">
                 <div class="p-6">
                     <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                         <div class="sm:col-span-1">
                             <dt class="text-sm font-medium text-gray-500">ID</dt>
                             <dd class="mt-1 text-sm text-gray-900">{{ $company->id }}</dd>
                         </div>
                         <div class="sm:col-span-1">
                             <dt class="text-sm font-medium text-gray-500">Name</dt>
                             <dd class="mt-1 text-sm text-gray-900">{{ $company->name }}</dd>
                         </div>
                         <div class="sm:col-span-1">
                             <dt class="text-sm font-medium text-gray-500">Theme</dt>
                             <dd class="mt-1 text-sm text-gray-900 capitalize">{{ $company->theme }}</dd>
                         </div>
                     </dl>
                 </div>
             </div>
 

             {{-- Projects Section and Table --}}
             <div class="mb-6 flex items-center justify-between">
                 <h3 class="text-lg font-semibold text-gray-900">Projects</h3>
                 <a href="{{ route('projects.create', ['company_id' => $company->id]) }}"
                    class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                     <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                         <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                     </svg>
                     Add Project
                 </a>
             </div>
 

             <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                 <div class="overflow-x-auto">
                     <table class="min-w-full divide-y divide-gray-200">
                         <thead class="bg-gray-50">
                             <tr>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                     Name
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                     Tasks
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                     Actions
                                 </th>
                             </tr>
                         </thead>
                         <tbody class="divide-y divide-gray-200 bg-white">
                             @forelse($company->projects as $project)
                                 <tr>
                                     <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ $project->name }}</td>
                                     <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $project->tasks()->count() }}</td>
                                     <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                         <div class="flex items-center justify-end space-x-2">
                                             <a href="{{ route('projects.show', $project) }}"
                                                class="text-blue-600 hover:text-blue-900">View</a>
                                             <span class="text-gray-300">|</span>
                                             <a href="{{ route('projects.edit', $project) }}"
                                                class="text-amber-600 hover:text-amber-900">Edit</a>
                                         </div>
                                     </td>
                                 </tr>
                             @empty
                                 <tr>
                                     <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                                         No projects for this company yet.
                                     </td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>