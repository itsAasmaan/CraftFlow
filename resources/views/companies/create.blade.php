<x-app-layout>
    @section('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Company
        </h2>
    @endsection


    <div class="py-12">
        <div class="mx-auto max-w-md sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form method="POST" action="{{ route('companies.store') }}" class="space-y-6">
                    @csrf


                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                        @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>


                    <div>
                        <label for="theme" class="block text-sm font-medium text-gray-700">Theme</label>
                        <select name="theme" id="theme"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="minimalist" @selected(old('theme')==='minimalist')>Minimal</option>
                            <option value="corporate" @selected(old('theme')==='corporate')>Modern</option>
                            <option value="dark" @selected(old('theme')==='dark')>Dark</option>
                        </select>
                        @error('theme') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>


                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('companies.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>