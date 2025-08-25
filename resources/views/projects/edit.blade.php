<x-app-layout>
     @section('header')
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
             Edit Project
         </h2>
     @endsection
 

     <div class="py-12">
         <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
             <div class="bg-white shadow-md rounded-lg p-8">
                 <form action="{{ route('projects.update', $project) }}" method="POST" class="space-y-6">
                     @csrf 
                     
                     <div>
                         <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
                         <div class="mt-1">
                             <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                         </div>
                         @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                     </div>
 

                     <div>
                         <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                         <div class="mt-1">
                             <textarea name="description" id="description" rows="4"
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description', $project->description) }}</textarea>
                         </div>
                         @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                     </div>
 

                     <div>
                         <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                         <div class="mt-1">
                             <select name="company_id" id="company_id"
                                     class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                 <option value="">— None —</option>
                                 @foreach($companies as $company)
                                     <option value="{{ $company->id }}"
                                             @selected(old('company_id', $project->company_id) == $company->id)>
                                         {{ $company->name }}
                                     </option>
                                 @endforeach
                             </select>
                         </div>
                         @error('company_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                     </div>
 

                     <div class="flex items-center justify-end gap-4">
                         <a href="{{ route('projects.show', $project) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                             Back
                         </a>
                         <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                             Update
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </x-app-layout>