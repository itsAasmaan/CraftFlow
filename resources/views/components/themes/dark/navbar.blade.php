<nav class="bg-gray-800 text-white border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ route('dashboard') }}"  class="text-xl font-bold text-gray-100">
            CraftFlow
        </a>
        <div class="flex gap-4 items-center">
            <a href="{{ route('projects.index') }}" class="text-gray-300 hover:text-white font-medium">Projects</a>
            <a href="{{ route('theme.index') }}" class="text-gray-300 hover:text-white font-medium">Theme</a>
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.users.index') }}" class="text-gray-300 hover:text-white font-medium">Manage Users</a>
                @endif
            @endauth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                {!! app(\App\Services\AbstractFactory\Contracts\ThemeFactory::class)->createButton('Logout')->render() !!}
            </form>
        </div>
    </div>
</nav>