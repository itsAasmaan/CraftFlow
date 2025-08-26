<x-app-layout>
     @section('header')
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
             Reports
         </h2>
     @endsection
     <div class="py-12">
         <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
             <div class="overflow-hidden rounded-lg bg-white p-8 shadow-md">
                 <h3 class="mb-6 text-xl font-semibold text-gray-800">Generate a Report</h3>
                 <form method="POST" action="{{ route('reports.generate') }}" class="space-y-6">
                     @csrf
                     <div>
                         <label for="report-type" class="block text-sm font-medium text-gray-700">Choose Report Type</label>
                         <div class="mt-1">
                             <select name="type" id="report-type"
                                     class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                 <option value="projects">Project Report</option>
                                 <option value="tasks">Task Report</option>
                                 <option value="users">User Performance Report</option>
                             </select>
                         </div>
                     </div>
                     <div class="flex justify-end">
                         <button type="submit"
                                 class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                             <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V4a1 1 0 112 0v6.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                             </svg>
                             Generate Report
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </x-app-layout>