<x-app-layout>
     @section('header')
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
             Admin Dashboard
         </h2>
     @endsection
 
     <div class="py-12">
         <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
             <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                 {{-- Users Management Card --}}
                 <div class="overflow-hidden rounded-lg bg-white p-6 shadow-md transition-shadow duration-300 hover:shadow-lg">
                     <h3 class="mb-2 text-lg font-bold text-gray-900">👥 Users</h3>
                     <p class="mb-4 text-gray-500">Manage application users, their roles, and permissions.</p>
                     <a href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                         Manage Users
                     </a>
                 </div>
                 {{-- Companies Management Card --}}
                 <div class="overflow-hidden rounded-lg bg-white p-6 shadow-md transition-shadow duration-300 hover:shadow-lg">
                     <h3 class="mb-2 text-lg font-bold text-gray-900">🏢 Companies</h3>
                     <p class="mb-4 text-gray-500">Add, edit, or remove companies and manage their specific themes.</p>
                     <a href="{{ route('companies.index') }}"
                        class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                         Manage Companies
                     </a>
                 </div>
                 {{-- Projects Management Card --}}
                 <div class="overflow-hidden rounded-lg bg-white p-6 shadow-md transition-shadow duration-300 hover:shadow-lg">
                     <h3 class="mb-2 text-lg font-bold text-gray-900">📂 Projects</h3>
                     <p class="mb-4 text-gray-500">View and track all projects, assign tasks, and monitor progress.</p>
                     <a href="{{ route('projects.index') }}"
                        class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                         Manage Projects
                     </a>
                 </div>
                 {{-- Reports Management Card --}}
                 <div class="overflow-hidden rounded-lg bg-white p-6 shadow-md transition-shadow duration-300 hover:shadow-lg">
                     <h3 class="mb-2 text-lg font-bold text-gray-900">📈 Reports</h3>
                     <p class="mb-4 text-gray-500">Generate system usage, performance, and progress reports.</p>
                     <a href="#"
                        class="inline-flex items-center rounded-md border border-transparent bg-amber-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                         View Reports
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>