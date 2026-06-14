{{-- Navbar Component --}}
<nav class="bg-primary text-white py-4 px-6 md:px-16 flex justify-between items-center sticky top-0 z-50 shadow-md">
    {{-- Logo --}}
    <a href="{{ route('home') }}" class="flex items-center gap-3">
        <div class="w-10 h-10 border-2 border-white rounded-full flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
            </svg>
        </div>
        <span class="font-serif text-2xl tracking-widest font-bold uppercase">Seraya</span>
    </a>

    {{-- Menu --}}
    <div class="hidden md:flex gap-8 text-sm tracking-wide font-light">
        <a href="{{ route('home') }}" class="hover:text-gray-300 transition">BERANDA</a>
        <a href="{{ route('visitor.packages') }}" class="hover:text-gray-300 transition">PAKET WISATA</a>
        @auth('web')
            @if(auth()->user()->role !== 'admin')
                <a href="{{ route('my-orders') }}" class="hover:text-gray-300 transition">PESANAN SAYA</a>
            @endif
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
