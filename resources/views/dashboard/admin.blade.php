<x-app-layout>
    <x-slot name="header">Admin Dashboard</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-gray-500">Welcome, Admin! Manage users, projects, and reports.</p>
                    <div class="mt-4 flex gap-3">
                        {!! $themeFactory->createButton('New Project')->render() !!}
                        {!! $themeFactory->createSecondaryButton('Invite User')->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>