<x-app-layout>
    <x-slot name="header">
        {{ __('Employee Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-gray-500">
                        {{ __('Welcome, Employee! View your assigned tasks and update status.') }}
                    </p>
                    <div class="mt-4 flex gap-3">
                        {!! $themeFactory->createButton(__('My Tasks'))->render() !!}
                        {!! $themeFactory->createSecondaryButton(__('Submit Report'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>