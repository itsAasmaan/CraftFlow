<x-app-layout>
    @section('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Companies
        </h2>
    @endsection

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-lg bg-green-100 p-4 text-green-800" role="alert">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="mb-6 flex justify-end">
                <a href="{{ route('companies.create') }}"
                   class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    New Company
                </a>
            </div>

            <div class="overflow-hidden rounded-lg bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    Theme
                                </th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($companies as $company)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">{{ $company->id }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $company->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm capitalize text-gray-500">{{ $company->theme }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('companies.show', $company) }}"
                                               class="text-blue-600 hover:text-blue-900">View</a>
                                            <span class="text-gray-300">|</span>
                                            <a href="{{ route('companies.edit', $company) }}"
                                               class="text-amber-600 hover:text-amber-900">Edit</a>
                                            <span class="text-gray-300">|</span>
                                            <form method="POST" action="{{ route('companies.destroy', $company) }}"
                                                  onsubmit="return confirm('Are you sure you want to delete this company? This action cannot be undone.')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No companies found.
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