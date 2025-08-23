<x-app-layout>
    {{-- <x-slot name="header"> --}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Theme Settings
        </h2>
    {{-- </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('theme.update') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            @foreach ($availableThemes as $theme)
                                <div class="flex items-center">
                                    <input type="radio" id="{{ $theme }}" name="theme" value="{{ $theme }}"
                                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                        @if ($theme === $currentTheme) checked @endif>
                                    <label for="{{ $theme }}" class="ml-3 text-sm font-medium text-gray-700 capitalize">
                                        {{ $theme }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            {!! app(\App\Services\AbstractFactory\Contracts\ThemeFactory::class)->createButton('Save Theme')->render() !!}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>