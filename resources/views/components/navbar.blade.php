{{-- Navbar Component --}}
<nav class="bg-primary text-white h-16 px-6 md:px-16 flex justify-between items-center sticky top-0 z-50 shadow-md">
    {{-- Logo --}}
    <a href="{{ route('home') }}" class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Seraya Logo" class="h-14 w-auto -my-2">
    </a>

    {{-- Menu --}}
    <div class="hidden md:flex gap-8 text-sm tracking-wide font-light">
        <a href="{{ route('home') }}" class="hover:text-gray-300 transition">BERANDA</a>
        <a href="{{ route('visitor.packages') }}" class="hover:text-gray-300 transition">PAKET WISATA</a>
        @auth('web')
            @if(auth()->user()->role !== 'admin')
                <a href="{{ route('my-orders') }}" class="hover:text-gray-300 transition">PESANAN SAYA</a>
            @endif
        @else
            <a href="{{ route('login') }}" class="hover:text-gray-300 transition">PESANAN SAYA</a>
        @endauth
    </div>

    {{-- Auth --}}
    <div class="flex items-center gap-4 text-sm">
        @auth('web')
            @if(auth()->user()->role !== 'admin')
                <span class="font-medium">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-white/20 px-5 py-2 rounded-full hover:bg-white/30 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('register') }}" class="font-medium hover:text-gray-300">SIGN IN</a>
                <a href="{{ route('login') }}" class="bg-white/20 px-5 py-2 rounded-full hover:bg-white/30 transition">Log in</a>
            @endif
        @else
            <a href="{{ route('register') }}" class="font-medium hover:text-gray-300">SIGN IN</a>
            <a href="{{ route('login') }}" class="bg-white/20 px-5 py-2 rounded-full hover:bg-white/30 transition">Log in</a>
        @endauth
    </div>
</nav>
