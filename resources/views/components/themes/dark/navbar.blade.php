<nav class="bg-gray-800 text-white border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <div class="text-xl font-bold text-gray-100">
            CraftFlow
        </div>
        <div class="flex gap-2">
            <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white font-medium">Dashboard</a>
            <a href="{{ route('theme.index') }}" class="text-gray-300 hover:text-white font-medium">Theme</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                {!! app(\App\Services\AbstractFactory\Contracts\ThemeFactory::class)->createButton('Logout')->render() !!}
            </form>
        </div>
    </div>
</nav>