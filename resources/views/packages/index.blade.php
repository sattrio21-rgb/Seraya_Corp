<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Wisata - Seraya Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        primary: '#2C4463',
                        secondary: '#FDF7F5',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-primary text-white py-4 px-6 md:px-16 flex justify-between items-center sticky top-0 z-50 shadow-md">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 border-2 border-white rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
            </div>
            <span class="font-serif text-2xl tracking-widest font-bold uppercase">Seraya</span>
        </a>

        <div class="hidden md:flex gap-8 text-sm tracking-wide font-light">
            <a href="{{ route('home') }}" class="hover:text-gray-300 transition">BERANDA</a>
            <a href="{{ route('visitor.packages') }}" class="text-white font-medium border-b-2 border-white pb-0.5">PAKET WISATA</a>
            @auth('web')
                @if(auth()->user()->role !== 'admin')
                    <a href="{{ route('my-orders') }}" class="hover:text-gray-300 transition">PESANAN SAYA</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="hover:text-gray-300 transition">PESANAN SAYA</a>
            @endauth
        </div>

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

    <div class="max-w-7xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-serif font-bold text-primary mb-2">Paket Wisata</h1>
        <p class="text-gray-500 mb-8">Pilih paket perjalanan impianmu</p>

        @if($packages->isEmpty())
            <div class="text-center py-16 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <p class="text-lg">Belum ada paket wisata tersedia</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($packages as $package)
                    @auth('web')
                        @if(auth()->user()->role !== 'admin')
                            <a href="{{ route('booking.create', $package) }}" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300 cursor-pointer">
                        @else
                            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300">
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300 cursor-pointer">
                    @endauth
                        <div class="h-56 overflow-hidden">
                            @if($package->image)
                                <img src="{{ Storage::url($package->image) }}" alt="{{ $package->name }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $package->name }}</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-3">{{ $package->description }}</p>
                            <div class="border-t pt-4">
                                <span class="text-xl font-bold text-primary">Rp. {{ number_format($package->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    @auth('web')
                        @if(auth()->user()->role !== 'admin')
                            </a>
                        @else
                            </div>
                        @endif
                    @else
                        </a>
                    @endauth
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>
