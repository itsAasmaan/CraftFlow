<x-app-layout>
    @section('header')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Employee Dashboard
        </h2>
    @endsection
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div
                    class="overflow-hidden rounded-lg bg-white p-6 shadow-md transition-shadow duration-300 hover:shadow-lg">
                    <h3 class="mb-2 text-lg font-bold text-gray-900">✅ My Tasks</h3>
                    <p class="mb-4 text-gray-500">
                        View all tasks assigned to you and update their progress.
                    </p>
                    <a href="{{ route('employee.tasks.index') }}" class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        View Tasks
                    </a>
                </div>
                {{-- Submit Report Card --}}
                <div
                    class="overflow-hidden rounded-lg bg-white p-6 shadow-md transition-shadow duration-300 hover:shadow-lg">
                    <h3 class="mb-2 text-lg font-bold text-gray-900">📝 Submit Report</h3>
                    <p class="mb-4 text-gray-500">
                        Send daily or weekly progress reports to your manager.
                    </p>
                    <a href="#"
                        class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Submit Report
                    </a>
                </div>
                {{-- Profile Card --}}
                <div
                    class="overflow-hidden rounded-lg bg-white p-6 shadow-md transition-shadow duration-300 hover:shadow-lg">
                    <h3 class="mb-2 text-lg font-bold text-gray-900">👤 My Profile</h3>
                    <p class="mb-4 text-gray-500">
                        Update your account information and personal settings.
                    </p>
                    <a href="{{ route('profile.edit') }}"
                        class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-colors duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
