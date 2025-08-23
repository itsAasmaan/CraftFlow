<x-app-layout>
    <x-slot name="header">
        {{ __('Manager Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-gray-500">
                        {{ __('Welcome, Manager! Oversee project progress and assign tasks.') }}
                    </p>
                    <div class="mt-4 flex gap-3">
                        {!! $themeFactory->createButton(__('View Team Progress'))->render() !!}
                        {!! $themeFactory->createSecondaryButton(__('Create Task'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>