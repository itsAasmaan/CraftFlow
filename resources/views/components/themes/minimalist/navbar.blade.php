<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <div class="text-xl font-bold text-gray-800">
            CraftFlow
        </div>
        <div class="flex gap-4 items-center justify-between mt-2 mb-2">
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800 font-medium">Dashboard</a>
            <a href="{{ route('theme.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">Theme</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                {!! app(\App\Services\AbstractFactory\Contracts\ThemeFactory::class)->createButton('Logout')->render() !!}
            </form>
        </div>
    </div>
</nav>